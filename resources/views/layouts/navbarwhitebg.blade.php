<nav class="navbar navbar-expand-lg text-light">

    <a class="navbar-brand" href="/home">
        <img src="{{ asset('images/yupplogo.png')}}" alt="logo" /></a>
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
                <a class="nav-link {{ request()->is('buy') ? 'active' : '' }}" href="/buy">Buy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('sell') ? 'active' : '' }}" href="/sell">Sell</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('rent') ? 'active' : '' }}" href="/rent">Rent</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Design</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Build</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/aboutus">About Us</a>
            </li>
        </ul>

        @if (session('id'))
        <div class="dropdown">
            <a class="user-logged dropdown-toggle" type="button" id="loginStatus" aria-haspopup="true"
                aria-expanded="false">
                Hi, {{ Session::get('first_name') }}!
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="loginStatus">
                @auth
                <li><a class="dropdown-item" href="{{ route('user.account', ['id' => Auth::user()->id]) }}">Account</a>
                </li>
                @endauth
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
        @else
        <a href="/signinsignup" id="loginStatus" class="button btn btn-danger signin-signup">Sign In / Sign Up</a>
        @endif
    </div>

</nav>