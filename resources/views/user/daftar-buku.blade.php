@extends('layouts-user.main')
@section('title','Library MCU')

    
    @section('container')
    <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Discover an Enriching World of Knowledge </h1>
          <h2>Explore a Wide Array of Captivating Books and Engaging Literary Events!</h2>
          <!-- <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div> -->
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Dashboard Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Daftar Buku Library MCU</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        <form action="/books" method="GET" class="d-flex" role="search">
              @csrf
                <input class="form-control me-2" type="text" name="keyword" size="20" style="padding-right:50px"autofocus autocomplete="off" placeholder="Masukkan Keyword" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
            </form>
            <br>
            <a class="btn btn-primary" href="{{ route('usul-create') }}">TAMBAH USULAN BUKU</a>
      <br>
        
        <div class="row">
        <?php $i = 1; ?>
        @foreach ($books as $row)

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img src="{{ asset('assets/img/skills.png') }}" width="90%" align="center"></div>
              <h4><a href="{{ route('user.details-buku', $row->id) }}">{{ $row->title }}</a></h4>
              <p>
                  <b>Penulis :</b> {{ $row->author }} <br>
                  <b>Penerbit :</b> {{ $row->publisher }} <br>
                  <b>Tahun Terbit :</b> {{ $row->year }} <br>
                  <b>Kategori :<br></b> {{ $row->category }} <br>
              </p>

            </div>
          </div>
          <br>

          
      <?php $i++; ?>
      @endforeach
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
      <div class="d-flex justify-content-end">
        {{ $books->links() }}
      </div>

    </section>
    <!-- End Services Section -->

    
    @endsection