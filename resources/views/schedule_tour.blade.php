<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $propertyDetails->address }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('images/yupp-logo.png') }}" sizes="16x16 32x32" type="image/png" />
    <link href="{{ asset('css/schedule-tour.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1>Schedule a Tour</h1>
        <form
            action="{{ route('scheduled.tour', ['propertyId' => $propertyDetails->id, 'propertyImageId' => $firstPropertyImage->id]) }}"
            method="POST">
            @csrf
            <div class="mb-3">
                <label for="tour_date" class="form-label">Tour Date:</label>
                <input type="date" id="tour_date" name="tour_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tour_time" class="form-label">Tour Time:</label>
                <input type="time" id="tour_time" name="tour_time" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tour_contact_number" class="form-label">Contact Number:</label>
                <input type="text" id="tour_contact_number" name="tour_contact_number" class="form-control" required>
            </div>
            <button type="submit" class="btn sched">Schedule Tour</button>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/admin_show.js')}}"></script>

    @include('layouts/errors')
</body>

</html>