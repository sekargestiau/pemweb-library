@extends('layouts-admin.main')
@section('title','Data Buku - Library MCU')

    
    @section('container')

    @if (session('success'))
        <!-- Modal Sukses Dihapus -->
            <div class="modal fade" id="SuccessAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body"><b>Data Berhasil Diupdate!</b></div>
                    </div>
                </div>
            </div>
        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#SuccessAddModal').modal('show');
                
                // Menghapus sesi flash 'success' setelah beberapa saat
                setTimeout(function() {
                    $('#SuccessAddModal').modal('hide');
                    {{ Session::forget('success2') }};
                }, 1000000); // Menutup modal setelah 3 detik (3000 milidetik)
                });

            </script>  
    @endif

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>
@auth
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <!-- <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg"> -->
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
                @endauth
                 <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<section id="inner-page">   
            <div class="container" style="padding: 0 200px;">
                <div class="card">
                    <h3 class="text-center card-header">Edit Data User</h3>
                    <form action="{{ route('data-user.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-text grid-item p-4">
                        <div class="mb-3">
                                <label form="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ $model->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{ $model->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="password" value="{{ $model->password }}">
                            </div>
                            <div class="mb-3">
                                <label for="profile_photo" class="form-label">Profile Photo</label>
                                <input type="file" accept="image/png, image/gif, image/jpeg" name="profile_photo" class="form-control" id="profile_photo" aria-describedby="profile_photo" value="{{ $model->profile_photo }}">
                            </div>
                           
                         <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



@endsection

