<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
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
        <form class="" method="POST" action="{{ route('user.updateaccount', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="account">
                <img src="{{ asset('images/yupp-logo.png') }}" alt="" width="100px">
            </div>
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input type="text" class="form-control" name="first_name" id="first_name"
                    value="{{ $user->first_name }}" required />
                <label for="last_name" class="pt-2">Last name:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}"
                    required />
                <label for="email" class="pt-2">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required />
                <label for="pass" class="pt-2">Password:</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your password here"
                    required />
                <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Show Password
                <div class=" pt-3 text-center updated">
                    <button class="btn btn-success update" type="submit">Update</button>
                    <a class="btn btn-danger" href="{{ url()->previous() }}">Cancel</a>
                </div>
            </div>

        </form>
    </div>

    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/account.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


    @include('layouts/errors')
</body>

</html>