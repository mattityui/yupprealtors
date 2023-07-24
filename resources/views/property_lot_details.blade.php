<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $propertyLotDetails->address }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/yupp-logo.png') }}" sizes="16x16 32x32" type="image/png" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buy.css') }}" rel="stylesheet">
    <link href="{{ asset('css/property-details.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts/navbarwhitebg')
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-6">
                @if($propertyImages->isNotEmpty())
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="slick-carousel big-image-carousel">
                            @foreach ($propertyImages as $image)
                            <div>
                                <img src="{{ $image }}" class="img-fluid" alt="Big Property Image">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="slick-carousel sub-image-carousel">
                            @foreach ($propertyImages as $image)
                            <div>
                                <img src="{{ $image }}" class="img-fluid" alt="Property Image">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <!-- Display a default image if the property has no images -->
                <div class="card mb-4">
                    <div class="card-body">
                        <img src="{{ asset('images/properties/default.jpg') }}" class="img-fluid" alt="Default Image">
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-6">
                <form>
                    <div class="property_details">
                        <h1><strong>{{ $propertyLotDetails->lot_address }}</strong></h1> <br>
                        <div class="details">
                            <div class="price-wrapper">
                                <p class="price-text"><strong>₱{{ number_format($propertyLotDetails->lot_price)
                                        }}</strong><br>Price</p>
                            </div>
                            <h1>|</h1>

                            <div class="floor-wrapper">
                                <p class="floor-text"><strong>{{ number_format($propertyLotDetails->lot_area)
                                        }} sqft</strong><br>Lot Area</p>
                            </div>


                        </div>
                    </div>

                    <div class="tour">
                        <a href="{!! route('scheduledlot.tour.form', ['propertyId' => $propertyLotDetails->lot_id, 'propertyImageId' => $firstPropertyLotImage->id]) !!}"
                            class="btn btn-danger">Request a Tour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('layouts/slides')

    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="/js/admin_show.js"></script>
    @include('layouts/footer')
    @include('layouts/errors')

</body>

</html>