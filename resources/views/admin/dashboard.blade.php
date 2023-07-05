@extends('layouts-admin.main')
@section('title','Data Buku - Library MCU')

    
    @section('container')

    @if (Session::has('success'))
        <!-- Modal Sukses Dihapus -->
            <div class="modal fade" id="SuccessDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body"><b>Data Berhasil Dihapus!</b></div>
                    </div>
                </div>
            </div>
        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#SuccessDeleteModal').modal('show');
                
                // Menghapus sesi flash 'success' setelah beberapa saat
                setTimeout(function() {
                    $('#SuccessDeleteModal').modal('hide');
                    {{ Session::forget('success') }};
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
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ url('data-buku')}}">  
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" name="keyword" value="{{ $keyword }}" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

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

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <a class="btn btn-secondary" href="#">TAMBAH DATA</a>

         <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" align="center">
            <thead align="center">
                    <tr align="center">
                    <th>No</th>
                        <th>Gambar Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori</th>
                        <th colspan="2">Manajemen</th>
                    </tr>
                </thead>
                <tfoot align="center">
                    <tr align="center">
                        <th>No</th>
                        <th>Gambar Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori</th>
                        <th colspan="2">Manajemen</th>
                    </tr>
                </tfoot>
                <tbody align="center">
                    <tr align="center">
                    <?php $i = 0;?>
                    @foreach($books as $key=>$value)
                        <td>{{ $books->firstItem() + $i }}</td>
                        <td><img src="{{ asset($value->book_photo) }}" alt=""></td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->author }}</td>
                        <td>{{ $value->publisher }}</td>
                        <td>{{ $value->year }}</td>
                        <td>{{ $value->category }}</td>
                        <td><a class="btn btn-primary" href="#">EDIT</a></td>
                        <td>
                            <a class="btn btn-danger" data-toggle="modal"  href="#"  data-target="#deleteModal<?= $value["id"]; ?>">DELETE</a>                       
                        </td>

                        <!-- Delete Modal-->
                        <div class="modal fade" id="deleteModal<?= $value["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin untuk hapus data?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Tekan tombol di bawah ini untuk menghapus data.</div>
                                        <div class="modal-footer">
                                            <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        DELETE
                                                    </button>
                                            </form>
                                            <!-- <button class="btn btn-primary" type="button" data-dismiss="modal">DELETE</button> -->
                                            <a class="btn btn-secondary" type="button" data-dismiss="modal">CANCEL</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                    </tr>
                        <?php $i++; ?>
                        @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            <div>
                Showing
                {{ $books->firstItem() }}
                to
                {{ $books->lastItem() }}
                of
                {{ $books->total() }}
                entries
            </div>
            <div class="float-right">
            {{ $books->links() }}
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



@endsection

