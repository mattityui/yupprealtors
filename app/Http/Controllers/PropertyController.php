<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Intervention\Image\Facades\Image as ImageFacade;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\PropertiesCondo;
use App\Models\PropertiesLot;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\ScheduledTour;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Gd\Imagine;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Session;
use DB;

use function League\Flysystem\get;
use function Spatie\Image\save;

class PropertyController extends Controller
{
    public function showProperties()
    {
        $property = Property::query()
            ->select('id', 'address', 'price', 'room', 'tb', 'lot_area', 'floor_area', 'type')
            ->get();

        $s = User::query()
            ->select(DB::raw('*'))
            ->where("role", "=", Session::get("role"))
            ->get()
            ->first();
        $propertycondo = PropertiesCondo::query()
            ->select('*')
            ->get();
        $propertylot = PropertiesLot::query()
            ->select('*')
            ->get();

        $scheduledTours = ScheduledTour::query()
            ->select(DB::raw("CONCAT(u.first_name, ' ', u.last_name) as name,scheduled_tour.id, scheduled_tour.tour_contact_number, u.email, p.address, p.type, scheduled_tour.tour_date,scheduled_tour.confirmation, scheduled_tour.tour_time"))
            ->join('users as u', 'u.id', '=', 'scheduled_tour.user_id')
            ->join('property_images as pi', 'pi.id', '=', 'scheduled_tour.property_image_id')
            ->join('properties as p', 'p.id', '=', 'pi.property_id')
            ->get();

        $scheduledCondoTours = ScheduledTour::query()
            ->select(DB::raw("CONCAT(u.first_name, ' ', u.last_name) as name,scheduled_tour.id, scheduled_tour.tour_contact_number, u.email, pc.condo_address, pc.condo_type, scheduled_tour.tour_date,scheduled_tour.confirmation, scheduled_tour.tour_time"))
            ->join('users as u', 'u.id', '=', 'scheduled_tour.user_id')
            ->join('property_images as pi', 'pi.id', '=', 'scheduled_tour.property_image_id')
            ->join('properties_condo as pc', 'pc.condo_id', '=', 'pi.property_condo_id')
            ->get();

        $scheduledLotTours = ScheduledTour::query()
            ->select(DB::raw("CONCAT(u.first_name, ' ', u.last_name) as name,scheduled_tour.id, scheduled_tour.tour_contact_number, u.email, pl.lot_address, pl.lot_type,scheduled_tour.confirmation, scheduled_tour.tour_date, scheduled_tour.tour_time"))
            ->join('users as u', 'u.id', '=', 'scheduled_tour.user_id')
            ->join('property_images as pi', 'pi.id', '=', 'scheduled_tour.property_image_id')
            ->join('properties_lot as pl', 'pl.lot_id', '=', 'pi.property_lot_id')
            ->get();



        return view('admin_home', compact("property", "s", "propertycondo", "propertylot", "scheduledTours", "scheduledCondoTours", "scheduledLotTours"));
    }

    public function addproperty(Request $request)
    {
        $property = new Property([
            'address' => $request->input('hl_address'),
            'price' => $request->input('hl_price'),
            'room' => $request->input('hl_room'),
            'tb' => $request->input('hl_tb'),
            'lot_area' => $request->input('hl_lot_area'),
            'floor_area' => $request->input('hl_floor_area'),
            'type' => $request->input('hl_title'),
        ]);

        $property->save();

        // Handle uploaded images
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $filename = date('Ymd') . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $filename);

                // Save the image record in the database
                $propertyImage = new PropertyImage([
                    'property_id' => $property->id,
                    'image' => $filename,
                ]);
                $propertyImage->save();
            }
        }


        return redirect('/admin')->with('success', 'Successfully created new property!');
    }


    public function showPropertyInfo(string $id)
    {
        $property_info = Property::findOrFail($id);

        // Get all images associated with the property
        $propertyImages = PropertyImage::where('property_id', $id)->get();

        $imageGallery = [];
        foreach ($propertyImages as $image) {
            $imagePath = public_path('images/properties/' . $image->image);

            // Get the image as a base64-encoded data URI
            $base64Image = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($imagePath));

            $imageGallery[] = [
                'url' => $base64Image,
                'id' => $image->id,
            ];
        }

        return view('admin_show_property', compact('property_info', 'imageGallery'));
    }

    public function updateProperty(Request $request, string $id)
    {
        $request->validate([
            'hl_address' => 'required|string',
            'hl_price' => 'required|integer|min:0',
            'hl_room' => 'required|integer|min:0',
            'hl_tb' => 'required|integer|min:0',
            'hl_lot_area' => 'required|integer|min:0',
            'hl_floor_area' => 'required|integer|min:0',
            'property_images.*' => 'image|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        ]);

        $property = Property::findOrFail($id);
        $property->address = $request->input('hl_address');
        $property->price = $request->input('hl_price');
        $property->room = $request->input('hl_room');
        $property->tb = $request->input('hl_tb');
        $property->lot_area = $request->input('hl_lot_area');
        $property->floor_area = $request->input('hl_floor_area');
        $property->save();



        return back()->with('success', 'Successfully updated property!');
    }
    public function deletePropertyImage(Request $request, string $propertyId, string $imageId)
    {
        $property = Property::findOrFail($propertyId);
        $image = PropertyImage::findOrFail($imageId);

        if ($image->property_id === $property->id) {

            Storage::delete('images/properties/' . $image->image);

            $image->delete();

            return redirect()->back()->with('success', 'Image deleted successfully');
        }

        return redirect()->back()->with('error', 'Failed to delete image');
    }
    public function addPropertyImage(Request $request, string $id)
    {
        // $request->validate([
        //     'property_images.*' => 'image|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        // ]);

        $property = Property::findOrFail($id);

        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $filename = date('Ymd') . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $filename);

                PropertyImage::create([
                    'property_id' => $property->id,
                    'image' => $filename,
                ]);
            }
        }


        return redirect()->back()->with('success', 'Images added successfully');
    }
    public function deleteProperty($id)
    {

        $property = Property::findOrFail($id);
        $property->property_images()->delete();
        $property->delete();

        return redirect('/admin')->with('success', 'Property deleted successfully!');
    }

    // ----------------------------CONDO------------------------------------//
    public function deletePropertyCondo($id)
    {
        $property = PropertiesCondo::findOrFail($id);
        $property->property_images()->delete();
        $property->delete();
        return redirect('/admin')->with('success', 'Property deleted successfully!');
    }
    public function deletePropertyLot($id)
    {
        $property = PropertiesLot::findOrFail($id);
        $property->property_images()->delete();
        $property->delete();
        return redirect('/admin')->with('success', 'Property deleted successfully!');
    }
    public function addpropertycondo(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        ]);

        $condo = new PropertiesCondo;
        $condo->condo_address = $request->input('c_address');
        $condo->condo_price = $request->input('c_price');
        $condo->condo_floor_area = $request->input('c_floor_area');
        $condo->condo_type = $request->input('c_title');

        $condo->save();

        if ($request->hasFile('c_property_images')) {
            foreach ($request->file('c_property_images') as $image) {
                $filename = date('Ymd') . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $filename);

                // Save the image record in the database
                $propertyImage = new PropertyImage([
                    'property_condo_id' => $condo->condo_id,
                    'image' => $filename,
                ]);
                $propertyImage->save();
            }
        }

        return redirect('/admin')->with('success', 'Successfully created new property!');
    }

    public function showPropertyInfoCondo(string $id)
    {

        $p_info = PropertiesCondo::query()
            ->select('*')
            ->where('condo_id', '=', $id)
            ->first();

        $pi = PropertyImage::query()
            ->select('*') // Only select the 'image' column from the property_images table
            ->where('property_condo_id', '=', $id)
            ->get();


        $imageGallery = [];
        foreach ($pi as $image) {
            $imagePath = public_path('images/properties/' . $image->image);

            // Get the image as a base64-encoded data URI
            $base64Image = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($imagePath));

            // Append the image to the image gallery array with 'url' and 'id' keys
            $imageGallery[] = [
                'url' => $base64Image,
                'id' => $image->id, // Assuming 'id' is the primary key of the PropertyImage model
            ];
        }


        return view('admin_show_property_condo', compact('p_info', 'imageGallery'));
    }

    public function updatePropertyCondo(Request $request, string $id)
    {


        // $request->validate([
        //     'condo_address' => 'required|string',
        //     'condo_price' => 'required|integer|min:0',
        //     'condo_floor_area' => 'required|integer|min:0',
        // ]);

        $p_condo = PropertiesCondo::findOrFail($id);
        $p_condo->condo_address = $request->input('c_address'); // Updated key name
        $p_condo->condo_price = $request->input('c_price'); // Updated key name
        $p_condo->condo_floor_area = $request->input('c_floor_area'); // Updated key name




        $p_condo->save();

        return back()->with('success', 'Successfully updated property condo!');
    }


    public function deletePropertyImageCondo(Request $request, string $propertyId, string $imageId)
    {
        // Find the property image by its ID
        $propertyImage = PropertyImage::findOrFail($imageId);

        // Check if the image belongs to the specified property
        if ($propertyImage->property_condo_id == $propertyId) {

            $propertyImage->delete();
        } else {
            abort(404); // Image does not belong to the property
        }
        // Delete the image from the database
        return redirect()->back()->with('success', 'Image deleted successfully');
    }

    public function addPropertyImageCondo(Request $request, string $id)
    {
        $request->validate([
            'property_images.*' => 'image|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        ]);

        $condo = PropertiesCondo::findOrFail($id);

        // Handle uploaded images
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $filename = date('Ymd') . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $filename);

                // Save the image record in the database
                $propertyImage = new PropertyImage([
                    'property_condo_id' => $condo->condo_id,
                    'image' => $filename,
                ]);
                $propertyImage->save();
            }
        }

        return redirect()->back()->with('success', 'Images added successfully');
    }

    // ----------------------------LOT------------------------------------//

    public function addpropertylot(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        ]);

        $lot = new PropertiesLot;
        $lot->lot_address = $request->input('lot_address');
        $lot->lot_price = $request->input('lot_price');
        $lot->lot_area = $request->input('lot_area');
        $lot->lot_type = $request->input('lot_title');

        $lot->save();

        if ($request->hasFile('lot_property_images')) {
            foreach ($request->file('lot_property_images') as $image) {
                $filename = date('Ymd') . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $filename);

                // Save the image record in the database
                $propertyImage = new PropertyImage([
                    'property_lot_id' => $lot->lot_id,
                    'image' => $filename,
                ]);
                $propertyImage->save();
            }
        }
        return redirect('/admin')->with('success', 'Successfully created new property!');
    }
    public function showPropertyInfoLot(string $id)
    {

        $p_info = PropertiesLot::query()
            ->select('*')
            ->where('lot_id', '=', $id)
            ->first();

        $pi = PropertyImage::query()
            ->select('*') // Only select the 'image' column from the property_images table
            ->where('property_lot_id', '=', $id)
            ->get();


        $imageGallery = [];
        foreach ($pi as $image) {
            $imagePath = public_path('images/properties/' . $image->image);

            // Get the image as a base64-encoded data URI
            $base64Image = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($imagePath));

            // Append the image to the image gallery array with 'url' and 'id' keys
            $imageGallery[] = [
                'url' => $base64Image,
                'id' => $image->id, // Assuming 'id' is the primary key of the PropertyImage model
            ];
        }


        return view('admin_show_property_lot', compact('p_info', 'imageGallery'));
    }

    public function updatePropertyLot(Request $request, string $id)
    {


        // $request->validate([
        //     'condo_address' => 'required|string',
        //     'condo_price' => 'required|integer|min:0',
        //     'condo_floor_area' => 'required|integer|min:0',
        // ]);

        $p_lot = PropertiesLot::findOrFail($id);
        $p_lot->lot_address = $request->input('lot_address'); // Updated key name
        $p_lot->lot_price = $request->input('lot_price'); // Updated key name
        $p_lot->lot_area = $request->input('lot_area'); // Updated key name
        $p_lot->save();

        return back()->with('success', 'Successfully updated property lot!');
    }


    public function deletePropertyImageLot(Request $request, string $propertyId, string $imageId)
    {
        // Find the property image by its ID
        $propertyImage = PropertyImage::findOrFail($imageId);

        // Check if the image belongs to the specified property
        if ($propertyImage->property_lot_id == $propertyId) {

            $propertyImage->delete();
        } else {
            abort(404); // Image does not belong to the property
        }
        // Delete the image from the database
        return redirect()->back()->with('success', 'Image deleted successfully');
    }

    public function addPropertyImageLot(Request $request, string $id)
    {
        $request->validate([
            'property_images.*' => 'image|mimes:jpeg,jpg,png,gif,svg,webp|max:5120',
        ]);

        $lot = PropertiesLot::findOrFail($id);

        // Handle uploaded images
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $filename = date('Ymd') . $image->getClientOriginalName();
                $image->move(public_path('images/properties'), $filename);

                // Save the image record in the database
                $propertyImage = new PropertyImage([
                    'property_lot_id' => $lot->lot_id,
                    'image' => $filename,
                ]);
                $propertyImage->save();
            }
        }

        return redirect()->back()->with('success', 'Images added successfully');
    }


    //----------------------------Client View------------------------------------//


    public function showUserProperties()
    {
        $properties = Property::query()
            ->select('properties.*', 'property_images.image')
            ->leftJoin('property_images', 'property_images.property_id', '=', 'properties.id')
            ->get();

        // Group the images by property_id
        $groupedProperties = [];
        foreach ($properties as $property) {
            $groupedProperties[$property->id]['property_info'] = $property;
            if ($property->image) {
                $groupedProperties[$property->id]['images'][] = asset('images/properties/' . $property->image);
            }
        }
        $propertiescondo = PropertiesCondo::query()
            ->select('properties_condo.*', 'property_images.image')
            ->leftJoin('property_images', 'property_images.property_condo_id', '=', 'properties_condo.condo_id')
            ->get();

        // Group the images by property_id
        $groupedPropertiesCondo = [];
        foreach ($propertiescondo as $condo) {
            $groupedPropertiesCondo[$condo->condo_id]['property_info'] = $condo;
            if ($condo->image) {
                $groupedPropertiesCondo[$condo->condo_id]['images'][] = asset('images/properties/' . $condo->image);
            }
        }

        $propertieslot = PropertiesLot::query()
            ->select('properties_lot.*', 'property_images.image')
            ->leftJoin('property_images', 'property_images.property_lot_id', '=', 'properties_lot.lot_id')
            ->get();

        // Group the images by property_id
        $groupedPropertiesLot = [];
        foreach ($propertieslot as $lot) {
            $groupedPropertiesLot[$lot->lot_id]['property_info'] = $lot;
            if ($lot->image) {
                $groupedPropertiesLot[$lot->lot_id]['images'][] = asset('images/properties/' . $lot->image);
            }
        }

        return view('buy', compact('groupedProperties', 'groupedPropertiesCondo', 'groupedPropertiesLot'));
    }


    public function showPropertyDetails(string $id)
    {
        $propertyDetails = Property::findOrFail($id);

        // Fetch the first property image's ID based on property_id
        $firstPropertyImage = DB::table('property_images')
            ->where('property_id', $id)
            ->select('id', 'image')
            ->first();

        // Now you can access the first property image's ID and image in the view
        if ($firstPropertyImage) {
            $firstPropertyImage->image = asset('images/properties/' . $firstPropertyImage->image);
        }

        $propertyImages = DB::table('property_images')
            ->where('property_id', $id)
            ->pluck('image')
            ->map(function ($imageName) {
                return asset('images/properties/' . $imageName);
            });

        return view('property_details', compact('propertyDetails', 'propertyImages', 'firstPropertyImage'));
    }


    public function scheduleTour(Request $request, string $propertyId, string $propertyImageId)
    {
        // Validate the form data
        // $request->validate([
        //     'tour_date' => 'required|date',
        //     'tour_time' => 'required',
        //     'tour_contact' => 'required',
        // ]);

        // Create the scheduled tour record
        $st = new ScheduledTour;
        $st->user_id =  auth()->user()->id;
        $st->property_image_id = $propertyImageId;
        $st->tour_date =   $request->input('tour_date');
        $st->tour_time =   $request->input('tour_time');
        $st->tour_contact_number = $request->input('tour_contact_number');
        $st->save();


        // Optionally, you can redirect back with a success message
        return redirect()->route('property.details', ['id' => $propertyId])->with('success', 'Scheduled tour successfully.');
    }

    public function showScheduleTourForm(string $propertyId, string $propertyImageId)
    {
        $propertyDetails = Property::findOrFail($propertyId);
        $firstPropertyImage = DB::table('property_images')
            ->where('property_id', $propertyId)
            ->select('id', 'image')
            ->first();

        // Now you can access the first property image's ID and image in the view
        if ($firstPropertyImage) {
            $firstPropertyImage->image = asset('images/properties/' . $firstPropertyImage->image);
        }

        return view('schedule_tour', compact('propertyDetails', 'firstPropertyImage'));
    }

    public function showUserPropertiesHome()
    {
        $properties = Property::query()
            ->select('properties.*', 'property_images.image')
            ->join('property_images', 'property_images.property_id', '=', 'properties.id')
            ->first();

        if ($properties) {
            $properties->image = asset('images/properties/' . $properties->image);
        }

        $propertiesCondoHome = PropertiesCondo::query()
            ->select('properties_condo.*', 'property_images.image')
            ->join('property_images', 'property_images.property_condo_id', '=', 'properties_condo.condo_id')
            ->first();
        if ($propertiesCondoHome) {
            $propertiesCondoHome->image = asset('images/properties/' . $propertiesCondoHome->image);
        }

        return view('home', compact('properties', 'propertiesCondoHome'));
    }


    public function showPropertyCondoDetails(string $id)
    {
        $propertyCondoDetails = PropertiesCondo::findOrFail($id);

        // Fetch the first property image's ID based on property_id
        $firstPropertyCondoImage = DB::table('property_images')
            ->where('property_condo_id', $id)
            ->select('id', 'image')
            ->first();

        // Now you can access the first property image's ID and image in the view

        if ($firstPropertyCondoImage) {
            $firstPropertyCondoImage->image = asset('images/properties/' . $firstPropertyCondoImage->image);
        }

        $propertyImages = DB::table('property_images')
            ->where('property_condo_id', $id)
            ->pluck('image')
            ->map(function ($imageName) {
                return asset('images/properties/' . $imageName);
            });

        return view('property_condo_details', compact('propertyCondoDetails', 'propertyImages', 'firstPropertyCondoImage'));
    }
    public function showScheduleCondoTourForm(string $propertyId, string $propertyImageId)
    {
        $propertyDetails = PropertiesCondo::findOrFail($propertyId);
        $firstPropertyImage = DB::table('property_images')
            ->where('property_condo_id', $propertyId)
            ->select('id', 'image')
            ->first();

        // Now you can access the first property image's ID and image in the view
        if ($firstPropertyImage) {
            $firstPropertyImage->image = asset('images/properties/' . $firstPropertyImage->image);
        }

        return view('schedulecondo_tour', compact('propertyDetails', 'firstPropertyImage'));
    }
    public function scheduleCondoTour(Request $request, string $propertyId, string $propertyImageId)
    {
        // Validate the form data
        // $request->validate([
        //     'tour_date' => 'required|date',
        //     'tour_time' => 'required',
        //     'tour_contact' => 'required',
        // ]);

        // Create the scheduled tour record
        $st = new ScheduledTour;
        $st->user_id =  auth()->user()->id;
        $st->property_image_id = $propertyImageId;
        $st->tour_date =   $request->input('tour_date');
        $st->tour_time =   $request->input('tour_time');
        $st->tour_contact_number = $request->input('tour_contact_number');
        $st->save();


        // Optionally, you can redirect back with a success message
        return redirect()->route('buy', ['id' => $propertyId])->with('success', 'Scheduled tour successfully.');
    }
    public function showPropertyLotDetails(string $id)
    {
        $propertyLotDetails = PropertiesLot::findOrFail($id);

        // Fetch the first property image's ID based on property_id
        $firstPropertyLotImage = DB::table('property_images')
            ->where('property_lot_id', $id)
            ->select('id', 'image')
            ->first();

        // Now you can access the first property image's ID and image in the view
        if ($firstPropertyLotImage) {
            $firstPropertyLotImage->image = asset('images/properties/' . $firstPropertyLotImage->image);
        }

        $propertyImages = DB::table('property_images')
            ->where('property_lot_id', $id)
            ->pluck('image')
            ->map(function ($imageName) {
                return asset('images/properties/' . $imageName);
            });

        return view('property_lot_details', compact('propertyLotDetails', 'propertyImages', 'firstPropertyLotImage'));
    }
    public function showScheduleLotTourForm(string $propertyId, string $propertyImageId)
    {
        $propertyDetails = PropertiesLot::findOrFail($propertyId);
        $firstPropertyImage = DB::table('property_images')
            ->where('property_lot_id', $propertyId)
            ->select('id', 'image')
            ->first();

        // Now you can access the first property image's ID and image in the view
        if ($firstPropertyImage) {
            $firstPropertyImage->image = asset('images/properties/' . $firstPropertyImage->image);
        }

        return view('schedulelot_tour', compact('propertyDetails', 'firstPropertyImage'));
    }
    public function scheduleLotTour(Request $request, string $propertyId, string $propertyImageId)
    {
        // Validate the form data
        // $request->validate([
        //     'tour_date' => 'required|date',
        //     'tour_time' => 'required',
        //     'tour_contact' => 'required',
        // ]);

        // Create the scheduled tour record
        $st = new ScheduledTour;
        $st->user_id =  auth()->user()->id;
        $st->property_image_id = $propertyImageId;
        $st->tour_date =   $request->input('tour_date');
        $st->tour_time =   $request->input('tour_time');
        $st->tour_contact_number = $request->input('tour_contact_number');
        $st->save();


        // Optionally, you can redirect back with a success message
        return redirect()->route('buy', ['id' => $propertyId])->with('success', 'Scheduled tour successfully.');
    }
    public function confirmTour(string $id)
    {

        $scheduledTour = ScheduledTour::find($id);

        if ($scheduledTour) {
            // Update the confirmation status for the selected tour
            $scheduledTour->confirmation = !$scheduledTour->confirmation;
            $scheduledTour->save();

            // You can return a response to the AJAX request to indicate success
            return back()->with('success', 'Successfully updated');
        }

        // Tour not found, return an error response
        return response()->json(['success' => false, 'error' => 'Tour not found.']);
    }
}
