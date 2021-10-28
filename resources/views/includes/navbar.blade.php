<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/images/dokterpost.png" alt="logo" style="max-width: 50%"/>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Rewards</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-success nav-link px-4 text-white"href="{{ route('login') }}">Sign In</a>
            </li>
            @endguest
          </ul>
          @auth
              <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('dashboard') }}" class="dropdown-item" >Dashboard</a>
                        <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item" >Settings</a>
                        <div class="dropdown-divider"></div>
                        <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="dropdown-item">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                      @php
                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                      @endphp
                      @if ($carts > 0)
                          <img src="/images/icon-cart-filled.svg" alt=""/>
                          <div class="card-badge">{{ $carts }}</div>
                      @else
                        <img src="/images/icon-cart-empty.svg" alt="" />
                      @endif
                    </a>
                </li>
            </ul>

            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Hi, Baher
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-block" href="#">
                        Cart
                    </a>
                </li>
            </ul>
          @endauth
        </div>
      </div>
    </nav>