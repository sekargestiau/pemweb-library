<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Library MCU</a></h1>
    
      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a class="nav-link scrollto" href="{{ url('home') }}">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="{{url('books')}}">Daftar Buku</a></li>
          <!-- <li class="dropdown"><a><span>{{ auth()->user()->nama_user }}</span> <i class="bi bi-chevron-down"></i></a> -->
            <ul>
              <li><a href="{{url('profile')}}">Lihat Profil</a></li>
              
              <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              </li>
              
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->