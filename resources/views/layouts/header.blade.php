<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">Library MCU</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                @if (Route::has('login'))
                    @auth
                        <li><a class="nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li><a class="nav-link scrollto" href="{{ route('register') }}" class="ml-4">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
<!-- End Header -->