<div class="bg-image">
    <!-- Begin Nav -->
    <nav class="navbar navbar-expand-lg text-light">

        <a class="navbar-brand" href="/home">
            <img src="images/yupplogo-white.png" alt="logo" /></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav pe-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/buy">Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sell">Sell</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rent">Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Design</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Build</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Real Estate Agent</a>
                </li>
            </ul>


            {{-- <a href="/signinsignup" id="loginStatus" class="button btn btn-danger signin-signup">Sign In / Sign
                Up</a> --}}
            @if (session('id'))
            <div class="dropdown">
                <a class="user-logged dropdown-toggle" type="button" id="loginStatus" aria-haspopup="true"
                    aria-expanded="false">
                    Hi, {{ Session::get('first_name') }}!
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="loginStatus">
                    @auth
                    <li><a class="dropdown-item"
                            href="{{ route('user.account', ['id' => Auth::user()->id]) }}">Account</a></li>
                    @endauth
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </div>
            @else
            <a href="/signinsignup" id="loginStatus" class="button btn btn-danger signin-signup">Sign In / Sign Up</a>
            @endif


        </div>

    </nav>
    <!-- End Nav -->

    <!-- Begin Search -->
    <div class="hero-seaction">
        <h1 class="text-start text-white fw-semibold  ">
            <strong> Discover a place that <br />you can call home</strong>
        </h1>
        <p class="text-white">Let's find a home that's perfect for you.</p>
        <div class="mt-3">
            <div class="col-md-10 offset-md-2"></div>
            <form class="d-flex" role="search">
                <input class="form-control flex-grow-1 search-bar" type="search"
                    placeholder="Search for City, Municipality, Neigbourhood, Zip" aria-label="Search" />
                <button class="btn btn-danger" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <!-- End Search -->
</div>