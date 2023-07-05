<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Library MCU</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
      @auth
        <ul>

          <li><a class="nav-link scrollto" href="{{ route('user.daftar-buku') }}">Daftar Buku</a></li>
          <li><a class="nav-link scrollto" href="{{ url('home') }}">Dashboard</a></li>
          <li class="dropdown"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i>
            <ul>
              <li><a href="{{ route('user.lihat-profile') }}">Lihat Profil</a></li>
              <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
              </form>
                
              </li>
              
            </ul>
          </li>

        </ul>
        @endauth
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
