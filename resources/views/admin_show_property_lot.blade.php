<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YUPP REALTORS® </title>
    <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />
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
            <h3>Property ID: {{$p_info->lot_id}}</h3>
            <form id="deleteForm" action="{{ route('admin.deletePropertyLot', ['id' => $p_info->lot_id]) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this property?')">Delete Property</button>
            </form>

            <hr>
            <form class="mt-5" method="POST" action="{{ route('admin.updatePropertyLot', ['id' => $p_info->lot_id]) }}">
                @csrf
                @method('PUT')
                <div class="row d-flex align-items-end">
                    <h3>Update property</h3>
                    <div class=" col-lg-5">
                        <label for="lot_address">Address:</label>
                        <input type="text" class="form-control" name="lot_address" id="lot_address"
                            value="{{$p_info->lot_address}}" required />
                    </div>
                    <div class="col-lg-3">
                        <label for="lot_price">Price:</label>
                        <input type="number" class="form-control" name="lot_price" id="lot_price"
                            value="{{$p_info->lot_price}}" min="0" required />
                    </div>

                    <div class="col-lg-1">
                        <label for="lot_area" ">Floor Area:</label>
                        <input type=" number" class="form-control" name="lot_area" id="lot_area"
                            value="{{$p_info->lot_area}}" min="0" required />
                    </div>
                </div>
                <div class="pt-3 mb-5">
                    <input class="btn btn-success" value="Update" type="submit">
                    <a class="btn btn-danger" href="{{ url('/admin') }}">Cancel</a>
                </div>
            </form>

            <hr>

            <h2>Add new images</h2>
            <form action="{{ route('admin.addPropertyImageLot', ['id' => $p_info->lot_id]) }}" method="POST"
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
            </form>
            <div class="row mb-5">
                @foreach ($imageGallery as $image)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="{{ $image['url'] }}" class="card-img-top" alt="Property Image">
                        <div class="card-body text-center">
                            <form
                                action="{{ route('admin.deletePropertyImageLot', ['propertyId' => $p_info->lot_id, 'imageId' => $image['id']]) }}"
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
        <script type="text/javascript" src="/js/admin_show.js"></script>

        @include('layouts/errors')

    </body>

</html>