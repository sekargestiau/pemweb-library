<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            @auth
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-event"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }}</div>
                <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->

            </a>
            @endauth
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Data User -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.data-user') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Data User</span></a>
            </li>


            <!-- Nav Item - Data Buku -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.data-buku') }}">
                    <i class="fas fa-fw fa-check-circle"></i>
                    <span>Data Buku</span></a>
            </li>


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
            </li>
            
                <script>
                  function confirmLogout() {
                    if (confirm('Apakah Anda yakin ingin logout?')) {
                      document.getElementById('logout-form').submit();
                    }
                  }
                </script>


            

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->
            <br><br>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->
        