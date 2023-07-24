<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>YUPP REALTORS® | BUY</title>
  <link rel="icon" href="images/yupp-logo.png" sizes="16x16 32x32" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/slick.css')}}" />
  <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
  <link rel="stylesheet" href="{{ asset('css/buy.css')}}" />
</head>

<body>
  <!-- Begin Nav -->
  @include('layouts/navbarwhitebg')
  <!-- End Nav -->
  <div class="modal fade" id="propertyModal" tabindex="-1" aria-labelledby="propertyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="propertyModalLabel">Property Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Property Details and Images will be displayed here -->
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="search-location">
      <h2><strong>Houses for sale near me</strong></h2>
      <p>Find houses for sale near you. View photos, open houses information,<br>
        and property details for nearby real estate.</p>
      <div class="row">
        <div class="col-lg-5">
          <label for="location">Location</label>
          <input type="text" id="location" placeholder="City, Address, Agent, Zip">
        </div>
        <div class="col-lg-4">
          <label for="pr-min">Price Range</label>
          <select name="min" id="pr-min">
            <option value="3,000,000">3,000,000</option>
            <option value="4,000,000">4,000,000</option>
            <option value="5,000,000">5,000,000</option>
            <option value="6,000,000">6,000,000</option>
          </select>
          <select name="max" id="pr-max">
            <option value="3,000,000">3,000,000</option>
            <option value="4,000,000">4,000,000</option>
            <option value="5,000,000">5,000,000</option>
            <option value="6,000,000">6,000,000</option>
          </select>
        </div>
        <div class="col-lg-3">
          <button class="btn btn-danger">Search</button>
        </div>
      </div>
    </div>


    <div class="house-and-lot">
      <h2>Bohol house and lot for sale</h2>
      <div class="row">
        @php
        $limit = 4;
        $cardCount = 0;
        @endphp
        @foreach ($groupedProperties as $property)
        @php
        $cardCount++;
        $showClass = ($cardCount <= $limit) ? 'show-card' : 'hidden-card' ; @endphp <a
          href="{{ route('property.details', ['id' => $property['property_info']->id]) }}"
          class="home col-lg-3 mb-3 property-card {{ $showClass }}">
          <div class="card text-center">
            @if (isset($property['images']))
            <div class="slick-carousel property-images">
              @foreach ($property['images'] as $index => $image)
              <div class="property-image {{ $index >= 4 ? 'hidden-image' : '' }}">
                <img src="{{ $image }}" class="card-img-top carousel-card-img" alt="Property Image">
              </div>
              @endforeach
            </div>
            @else
            <!-- Display a default image if the property has no images -->
            <img src="{{ asset('images/properties/default.jpg') }}" class="card-img-top carousel-card-img"
              alt="Default Image">
            @endif
            <div class="card-body d-grid gap-2">
              <div class="price-follow">
                <h4 class="card-title">₱{{ number_format($property['property_info']->price) }}</h4>
                <span class="heart"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
              </div>
              <p class="card-text">
                {{ $property['property_info']->room }} Beds | {{ $property['property_info']->tb }} Baths | {{
                $property['property_info']->floor_area }} sq.ft. <br>
                {{ $property['property_info']->address }}
              </p>
            </div>
          </div>
          </a>
          @endforeach
      </div>
      @if (count($groupedProperties) > $limit)
      <button class="show-more-btn" id="showMoreBtn">Show More</button>
      @endif
      <input type="hidden" id="limitValue" value="{{ $limit }}">
      <input type="hidden" id="cardCountValue" value="{{ $cardCount }}">
    </div>

    <div class="condominium">
      <h2>Bohol condominium for sale</h2>
      <div class="row">
        @php
        $limitcondo = 4;
        $cardCountcondo = 0;
        @endphp
        @foreach ($groupedPropertiesCondo as $property)
        @php
        $cardCountcondo++;
        $showClasscondo = ($cardCountcondo <= $limitcondo) ? 'show-card-condo' : 'hidden-card-condo' ; @endphp <a
          href="{{ route('propertycondo.details', ['id' => $property['property_info']->condo_id]) }}"
          class="home col-lg-3 mb-3 property-card-condo {{ $showClasscondo }}">
          <div class="card text-center">
            @if (isset($property['images']))
            <div class="slick-carousel property-images">
              @foreach ($property['images'] as $index => $image)
              <div class="property-image {{ $index >= 4 ? 'hidden-image' : '' }}">
                <img src="{{ $image }}" class="card-img-top carousel-card-img" alt="Property Image">
              </div>
              @endforeach
            </div>
            @else
            <!-- Display a default image if the property has no images -->
            <img src="{{ asset('images/properties/default.jpg') }}" class="card-img-top carousel-card-img"
              alt="Default Image">
            @endif
            <div class="card-body d-grid gap-2">
              <div class="price-follow">
                <h4 class="card-title">₱{{ number_format($property['property_info']->condo_price) }}</h4>
                <span class="heart"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
              </div>
              <p class="card-text">
                {{$property['property_info']->condo_floor_area }} sq.ft. (Floor Area)<br>
                {{ $property['property_info']->condo_address }}
              </p>
            </div>
          </div>
          </a>
          @endforeach
      </div>
      @if (count($groupedPropertiesCondo) > $limitcondo)
      <button class="show-more-condo" id="showMoreBtncondo">Show More</button>
      @endif
      <input type="hidden" id="limitValuecondo" value="{{ $limitcondo }}">
      <input type="hidden" id="cardCountValuecondo" value="{{ $cardCountcondo }}">

    </div>

    <div class="lot-only">
      <h2>Bohol lot for sale</h2>
      <div class="row">
        @php
        $limitlot = 4;
        $cardCountlot = 0;
        @endphp
        @foreach ($groupedPropertiesLot as $property)
        @php
        $cardCountlot++;
        $showClasslot = ($cardCountlot <= $limitlot) ? 'show-card-lot' : 'hidden-card-lot' ; @endphp <a
          href="{{ route('propertylot.details', ['id' => $property['property_info']->lot_id]) }}"
          class="home col-lg-3 mb-3 property-card-lot {{ $showClasslot }}">
          <div class="card text-center">
            @if (isset($property['images']))
            <div class="slick-carousel property-images">
              @foreach ($property['images'] as $index => $image)
              <div class="property-image {{ $index >= 4 ? 'hidden-image' : '' }}">
                <img src="{{ $image }}" class="card-img-top carousel-card-img" alt="Property Image">
              </div>
              @endforeach
            </div>
            @else
            <!-- Display a default image if the property has no images -->
            <img src="{{ asset('images/properties/default.jpg') }}" class="card-img-top carousel-card-img"
              alt="Default Image">
            @endif
            <div class="card-body d-grid gap-2">
              <div class="price-follow">
                <h4 class="card-title">₱{{ number_format($property['property_info']->lot_price) }}</h4>
                <span class="heart"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
              </div>
              <p class="card-text">
                {{$property['property_info']->lot_area }} sq.ft. (Lot Area)<br>
                {{ $property['property_info']->lot_address }}
              </p>
            </div>
          </div>
          </a>
          @endforeach
      </div>
      @if (count($groupedPropertiesLot) > $limitlot)
      <button class="show-more-lot" id="showMoreBtnlot">Show More</button>
      @endif
      <input type="hidden" id="limitValuelot" value="{{ $limitlot }}">
      <input type="hidden" id="cardCountValuelot" value="{{ $cardCountlot }}">
    </div>
  </div>

  <div class="buy-feedback">
    <h1 class="pb-5">See what our customers are saying</h1>
    <p>The YUPP Realtors team provided excellent photos and marketing of my property and an organized showing process.
      With the
      steep discount in fees and wonderful service, it's a no-brainer to use these guys to sell, and I am so satisfied
      with the overall selling experience that I am working with Andrew to buy as well!</p>
    <p><strong>- Taryn</strong></p>
  </div>


  <!-- Begin Slider -->
  @include('layouts/slides')
  <!-- End Slider -->


  <!-- Begin Footer -->
  @include('layouts/footer')


  <script src="https://kit.fontawesome.com/f15b7da99a.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/buy.js')}}"></script>

  @include('layouts/errors')

</body>

</html>