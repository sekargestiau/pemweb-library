@extends('layouts-user.main-details')
@section('title','SeminarKu')

    
    @section('container')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('home')}}">Dashboard</a></li>
      <li>Detail Buku</li>
    </ol>
    <h2>Detail Buku</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide">
            <img src="{{ asset('assets/img/skills.png') }}" width="90%" align="center" alt="">
            </div>


          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>{{ $books->title }}</h3>
          <ul>
            <li><strong>Penulis</strong>: {{ $books->author }}</li>
            <li><strong>Penerbit</strong>: {{ $books->publisher }}</li>
            <li><strong>Tahun Terbit</strong>: {{ $books->year }}</li>
            <li><strong>Kategori</strong>: {{ $books->category }}</li>
            
          </ul>
        </div>
        <div class="portfolio-description">
          <h2>Sinopsis Buku</h2>
          <p>
            {{ $books->sinopsis }}          
          </p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection