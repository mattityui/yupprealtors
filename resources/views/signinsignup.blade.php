<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />


    <link rel="stylesheet" href="/css/login-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png" />

    <title>YUPP REALTORS® | Sign in-Sign up</title>
</head>

<body>

    <div class="container">

        <a href="/home" class="back-button"><i class="fas fa-arrow-left"></i></a>

        <div class="signin-signup" id="sign-in-form">
            <form action="/signinsignup" method="POST" class="sign-in-form">
                @csrf
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Enter your email address" id="login-email" name="login_email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Enter your password" id="login-pass" name="login_pass" />
                    <i class="fas fa-eye toggle-password" id="togglePassword1"></i>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" />
                    <label class="form-check-label" for="remember"> Remember me </label>
                </div>
                <input type="submit" value="Login" class="btn" />
                <p class="social-text text-center">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icons"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-google"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-linkedin"></i></a>
                </div>
                <p class="account-text">
                    Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a>
                </p>
            </form>
            <form action="/signinsignup/register" method="POST">
                @csrf
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user" for="fname"></i>
                    <input type="text" placeholder="First Name" id="fname" name="reg_first_name" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-user" for="lname"></i>
                    <input type="text" placeholder="Last Name" id="lname" name="reg_last_name" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope" for="email"></i>
                    <input type="email" placeholder="Email" id="email" name="reg_email" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock" for="pass"></i>
                    <input type="password" placeholder="Password" id="pass" name="reg_password" required />
                    <i class="fas fa-eye toggle-password" id="togglePassword2"></i>
                </div>
                <input type="text" id="reg_role" name="reg_role" value="user" hidden />
                <div class="input-field">
                    <i class="fas fa-lock" for="c_pass"></i>
                    <input type="password" placeholder="Confirm Password" id="c_pass" name="reg_confirm_password"
                        required />
                    <i class="fas fa-eye toggle-password" id="togglePassword3"></i>
                </div>
                <div id="passwordMatchError" style="color: red; display: none;">Passwords do not match.</div>

                <input type="submit" value="SignUp" class="btn" />
                <p class="social-text text-center">Or Sign up with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icons"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-google"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-linkedin"></i></a>
                </div>
                <p class="account-text">
                    Already have an account? <a href="#" id="sign-in-btn2">Sign in</a>
                </p>

            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Welcome to <br />our community</h3>
                    <p>
                        Sign in now to personalize, updated daily, and beautifully presented.
                        Sign in your account to find your dream new home and get full
                        access to platform's functionality.</p>
                    </p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>

            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Let's find your comfort home, <br> Join us!</h3>
                    <p>
                        Sign up now to personalize, updated daily, and beautifully presented.
                        Create account to find your dream new home and get full
                        access to platform's functionality.
                    </p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/login.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include("layouts/errors")

</body>

</html>