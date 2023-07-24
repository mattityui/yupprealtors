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
    <link rel="stylesheet" href="css/sell.css" />
</head>

<body>
    <!-- Begin Nav -->
    @include('layouts/navbarwhitebg')
    <!-- End Nav -->


    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-7">
                <img src="images/sell-back.jpg" alt="Sell" class="w-100" />
            </div>
            <div class="col-lg-5 sell-text">
                <h4 class="sell-title">Sell for more and save on fees</h4>
                <p>
                    Redfin agents have the expertise to sell your home for top dollar,
                    and you’ll pay a low 1% listing fee when you buy and sell with us.
                    <br />
                    <br />
                    To get started, enter your address below. You’ll answer a few quick
                    questions and we'll be in touch within a couple of hours.
                </p>
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" placeholder="Enter your address" aria-label="Search" />

                    <button type="button" class="btn btn-danger w-25" data-bs-toggle="modal"
                        data-bs-target="#authModal4">
                        Next
                    </button>
                </form>
            </div>
        </div>
        <h2 class="text-center fw-bold pt-5">Why sell with YUPP Realtors?</h2>
        <div class="row cardmain">
            <div class="cardAlign">
                <div class="cardform">
                    <div class="card2">
                        <img src="{{asset('images/marketingIcon_user.png')}}" class="card-img-top2" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                We have the best agents in your market
                            </h5>
                            <p class="card-text">
                                YUPP agents rank in the top 1% of agents working at any
                                nationwide brokerage.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cardform">
                    <div class="card2">
                        <img src="{{asset('images/marketingIcon_cash_offer.png')}}" class="card-img-top2" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                Sell for more than the home next door
                            </h5>
                            <p class="card-text">
                                Independent research shows that homes listed with YUPP sell for
                                more than comparable homes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cardform">
                    <div class="card2">
                        <img src="{{asset('images/marketingIcon_yard_sign.png')}}" class="card-img-top2" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Save with our 1% listing fee</h5>
                            <p class="card-text">
                                When you buy and sell with us, you’ll pay a listing fee that’s
                                less than half.
                            </p>
                        </div>
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