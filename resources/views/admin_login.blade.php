<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YUPP REALTORS® | ADMIN LOGIN</title>
    <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="light">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="/images/yupp-logo.png" alt="logo" width="150">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Login</h1>
                            <form action="/admin/login" method="POST" class="needs-validation" novalidate=""
                                autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-mail Address</label>
                                    <input id="email" type="email" class="form-control" name="admin_email" value=""
                                        required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>

                                    </div>
                                    <input id="password" type="password" class="form-control" name="admin_password"
                                        required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember"
                                                class="form-check-input">
                                            <label for="remember" class="form-check-label">Remember Me</label>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="forgot.html">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-3">
                                    <button type="submit" class="btn btn-danger ms-auto w-100">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <script src="js/adminLogin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include("layouts/errors")
</body>

</html>