<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>YUPP REALTORS® | HOME</title>
  <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>

  <!-- End Background for Nav and Search -->
  @include("layouts/navbarimagebg")
  <!-- Begin Body Details -->


  <div class="container py-5">
    <div class="row">
      <h1 class="text-center"><b>Explore homes on YUPP Realtors</b></h1>
      <p class="text-center">
        Take a deep dive and browse homes for sale, original neighborhood
        photos, resident reviews and local insights to find what is right for
        you.
      </p>
    </div>
    <div class="row">
      <section class="pt-5">
        <div class="row">
          @if ($properties)
          @if ($properties->isEmpty())
          <p>No properties found.</p>
          @else
          <div class="home col-lg-4 mb-3">
            <div class="card text-center">
              <img src="{{ $properties->image }}" class="card-img-top carousel-card-img" alt="Property Image">
              <div class="card-body d-grid gap-2">
                <h4 class="card-title prop">₱{{ number_format($properties->price) }}</h4>
                <p class="card-text">
                  {{ $properties->room }} Beds | {{ $properties->tb }} Baths | {{ $properties->floor_area }} sq.ft. <br>
                  {{ $properties->address }}
                </p>
              </div>
            </div>
          </div>

          <div class="home col-lg-4 mb-3">
            <div class="card text-center">
              <img src="{{ $propertiesCondoHome->image }}" class="card-img-top carousel-card-img" alt="Property Image">
              <div class="card-body d-grid gap-2">
                <h4 class="card-title prop">₱{{ number_format($propertiesCondoHome->condo_price) }}</h4>
                <p class="card-text">
                  {{ $propertiesCondoHome->condo_type }} | {{ $propertiesCondoHome->condo_floor_area }} sq.ft. <br>
                  {{ $propertiesCondoHome->condo_address }}
                </p>
              </div>
            </div>
          </div>

          @endif
          @else
          <p>No properties found.</p>
          @endif

          <div class="home col-lg-4 mb-3 ">
            <div class="card text-center">
              <img class="card-img-top carousel-card-img2" src="images/atharra2.jpg" alt="Card Image" />

              <h4 class="card-title rec">Sign up to see more <br>recommendations for you</h4>
              <a href="/signinsignup"><button class="btn btn-danger">Join YUPP Realtors</button></a>
              <p class="card-text text-center pb-3">
                Already have an account? <a href="/signinsignup"> Sign in</a>
              </p>

            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="section-buy">
      <div class="col-lg-6">
        <img src="images/buy.jpg" alt="Buy" />
      </div>
      <div class="col-lg-6">
        <h4 class="display-4 mb-2 text-center text-lg-start">
          <strong>Buy a home</strong>
        </h4>
        <p class="text-center text-lg-start">
          Find your place with an immersive photo experience and the most
          listings, including things you won’t find anywhere else.
        </p>
        <div class="text-center text-lg-start">
          <a href="/buy" class="btn btn-style btn-lg" target="_blank">Browse homes</a>
        </div>
      </div>
    </div>

    <div class="section-sell">
      <div class="col-lg-6">
        <img src="images/sell.jpg" alt="Buy" />
      </div>
      <div class="col-lg-6">
        <h4 class="display-4 mb-2 text-center text-lg-start">
          <strong>Sell a home</strong>
        </h4>
        <p class="text-right">
          No matter what path you take to sell your home, we can help you <br>
          navigate a successful sale.
        </p>
        <div class="text-center text-lg-start">
          <a href="/sell" class="btn btn-style btn-lg" target="_blank">See your options</a>
        </div>
      </div>

    </div>
    <div class="section-rent">
      <div class="col-lg-6">
        <img src="images/rent.jpg" alt="Rent" />
      </div>
      <div class="col-lg-6">
        <h4 class="display-4 mb-2 text-center text-lg-start">
          <strong>Rent a home</strong>
        </h4>
        <p class="text-center text-lg-start">
          We’re creating a seamless online experience – from shopping on the
          largest rental network, to applying, to paying rent.
        </p>
        <div class="text-center text-lg-start">
          <a href="/rent" class="btn btn-style btn-lg" target="_blank">Find Rentals</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Body Details -->


  @include('layouts/slides')


  <!-- Begin Footer -->
  @include('layouts/footer')
  <!-- End Footer Details -->

  <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  @include('layouts/errors')

</body>

</html>