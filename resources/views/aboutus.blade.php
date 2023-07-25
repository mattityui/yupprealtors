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
        <p class="text-center pt-5 fs-2 m-0 ">
            <strong><i>"Don't just strive for excellence, you have to maintain it" </i></strong>
        </p>
        <p class="text-center pb-5 fs-5 ">
            <i> - Company motto</i>
        </p>
        <div class="row mb-5 text-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Short History</h5>
                        <p class="card-text">In the summer of 2013, a team of Young Professionals founded a group
                            of strong and motivated individuals with a purpose of empowering and
                            conquering the Real Estate Arena. These aggressive individuals set
                            the foundation for what evolved into a recognized and respected firm
                            - Young Urban Property Professionals. They combine knowledge,
                            competence, skills, character and attitude to compete and excel in
                            the industry.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mission</h5>
                        <p class="card-text">
                            Delivering the dream of home ownership everywhere.
                            All branches of the Ben Kinney Companies have this same goal, because owning real estate
                            provides security, safety and opportunity for individuals. The technology we build helps
                            real estate agents become more efficient at their job and find more customers to deliver on
                            that mission. Our training prepares agents to be even better by utilizing exceptional
                            techniques and systems, and the Ben Kinney Teams constantly help families find and sell
                            homes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vision</h5>
                        <p class="card-text">
                            Our vision is to become everybody’s partner in giving quality
                            products and rendering competent and quality services.
                            <br>• Honesty, Fairness and Integrity - whatever we do, whatever the
                            outcome, we want to be known as having done our part with honesty,
                            fairness and integrity. <br>• Adherence to the Golden Rule - "Do
                            unto others as we would have them do unto us."<br>•
                            Professionalism - When we undertake a task, we will do it as
                            promised or agreed with intelligence, enthusiasm, competence and
                            courtesy. We shall communicate with all interested parties in a
                            timely manner.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <iframe width="560" height="560" src="https://www.youtube.com/embed/Qex4gkXJkgQ"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>

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