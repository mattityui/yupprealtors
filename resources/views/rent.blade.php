<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YUPP REALTORS® | RENT</title>
    <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/rent.css" />
</head>

<body>
    <!-- Begin Nav -->
    @include('layouts/navbarwhitebg')
    <!-- End Nav -->


    <div class="container">
        <div class="row">
            <div class="search-location-rent">
                <div class="col-lg-6">
                    <h2><strong>Discover the perfect place to rent</strong></h2>
                    <p>See updated listings every day, search with tailored filters,<br>and contact property
                        managers—all from one place.</p>
                    <label for="location">Location</label>
                    <input type="text" id="location" placeholder="City, Address, Agent, Zip">
                    <button class="btn btn-danger">Search</button>
                </div>
                <div class="col-lg-6">
                    <img src="/images/rent-background.jpg" alt="rent-background">
                </div>
            </div>
        </div>
        <h2 class="pt-5">Resources for renters</h2>
        <div class="row pb-5">
            <div class="home col-lg-4 mb-3 d-none d-md-block">
                <div class="card text-center">
                    <img class="card-img-top carousel-card-img" src="images/rent1.png" alt="Card Image" />
                    <div class="card-body d-grid gap-2">
                        <h3 class="card-title">Stay up to date on the latest rental market trends</h3>
                        <a href="#">
                            <p class="card-text">
                                Learn more
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="home col-lg-4 mb-3 d-none d-md-block">
                <div class="card text-center">
                    <img class="card-img-top carousel-card-img" src="images/rent2.png" alt="Card Image" />
                    <div class="card-body d-grid gap-2">
                        <h3 class="card-title">Rent calculator: How much rent <br>can i afford?</h3>
                        <a href="#">
                            <p class="card-text">
                                Learn more
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="home col-lg-4 mb-3 d-none d-md-block">
                <div class="card text-center">
                    <img class="card-img-top carousel-card-img" src="images/rent3.png" alt="Card Image" />
                    <div class="card-body d-grid gap-2">
                        <h3 class="card-title">Get tips for first-time apartment renters</h3>
                        <a href="#">
                            <p class="card-text">
                                Learn more
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rent-feedback">
        <h1 class="pb-5">See what our customers are saying</h1>
        <p>The YUPP Realtors team provided excellent photos and marketing of my property and an organized showing
            process.
            With the
            steep discount in fees and wonderful service, it's a no-brainer to use these guys to sell, and I am so
            satisfied
            with the overall selling experience that I am working with Andrew to buy as well!</p>
        <p><strong>- Taryn</strong></p>
    </div>

    <!-- Begin Slider -->
    @include('layouts/slides')
    <!-- End Slider -->

    <!-- Begin Footer -->
    @include('layouts/footer')
    <!-- End Footer -->

    <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="/js/slick.js"></script>
    <script type="text/javascript" src="/js/buy.js"></script>

    @include('layouts/errors')

</body>

</html>