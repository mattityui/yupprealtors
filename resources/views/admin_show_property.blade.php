<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$property_info->address }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/yupp-logo.png') }}" sizes="16x16 32x32" type="image/png" />
    <link rel="stylesheet" href="{{ asset('css/admin-style.css')}}" />
</head>

<body>

    <body>
        <div class="container mt-5">
            <h3>Property ID: {{$property_info->id}}</h3>
            <form id="deleteForm" action="{{ route('admin.deleteProperty', ['id' => $property_info->id]) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this property?')">Delete Property</button>
            </form>
            <hr>
            <form class="mt-5" method="POST" action="{{ route('admin.updateProperty', ['id' => $property_info->id]) }}">
                @csrf
                @method('PUT')
                <div class="row d-flex align-items-end">
                    <h3>Update property</h3>
                    <div class="col-lg-5">
                        <label for="hl_address">Address:</label>
                        <input type="text" class="form-control" name="hl_address" id="hl_address"
                            value="{{$property_info->address}}" required />
                    </div>
                    <div class="col-lg-2">
                        <label for="hl_price">Price:</label>
                        <input type="number" class="form-control" name="hl_price" id="hl_price"
                            value="{{$property_info->price}}" min="0" required />
                    </div>
                    <div class="col-lg-1">
                        <label for="hl_room">Room/s:</label>
                        <input type="number" class="form-control" name="hl_room" id="hl_room"
                            value="{{$property_info->room}}" min="0" required />
                    </div>
                    <div class="col-lg-2">
                        <label for="hl_tb">Toilet & Bath:</label>
                        <input type="number" class="form-control" name="hl_tb" id="hl_tb" value="{{$property_info->tb}}"
                            min="0" required />
                    </div>
                    <div class="col-lg-1">
                        <label for="hl_lot_area">Lot Area:</label>
                        <input type="number" class="form-control" name="hl_lot_area" id="hl_lot_area"
                            value="{{$property_info->lot_area}}" min="0" required />
                    </div>
                    <div class="col-lg-1">
                        <label for="hl_floor_area">Floor Area:</label>
                        <input type="number" class="form-control" name="hl_floor_area" id="hl_floor_area"
                            value="{{$property_info->floor_area}}" min="0" required />
                    </div>
                </div>
                <div class="pt-3 mb-5">
                    <input class="btn btn-success" value="Update" type="submit">

                    <a class="btn btn-danger" href="{{ url('/admin') }}">Cancel</a>
                </div>
            </form>


            <hr>


            <h2>Add new images</h2>
            <form action="{{ route('admin.addPropertyImage', ['id' => $property_info->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <input type="file" class="form-control mb-3" name="property_images[]" id="property_images"
                            multiple required>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-danger" type="submit">Add Images</button>
                    </div>
                </div>
            </form>
            <div class="row mb-5">
                @foreach ($imageGallery as $image)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="{{ $image['url'] }}" class="card-img-top" alt="Property Image">
                        <div class="card-body text-center">
                            <form
                                action="{{ route('admin.deletePropertyImage', ['propertyId' => $property_info->id, 'imageId' => $image['id']]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete Image</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>


        <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="/js/slick.js"></script>
        <script type="text/javascript" src="{{ asset('js/admin_show.js')}}"></script>

        @include('layouts/errors')

    </body>

</html>