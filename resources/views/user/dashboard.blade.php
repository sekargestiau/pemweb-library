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
          <h2>Selamat Datang Di Website Library MCU</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">
            <h4>Sambutan Kepala Perpustakaan MCU</h4>
            <p align="justify">Assalamu'alaikum Wr. Wb.<br><br>
                      Puji syukur kita panjatkan kepada Allah SWT yang telah memberikan limpahan rahmat dan nikmat kepada kita semua sehingga website Perpustakaan MCU dapat diaktifkan kembali.<br>
                      <br>
                      Website perpustakaan merupakan sebuah layanan web yang hadir sebagai media komunikasi dan interaksi antara perpustakaan dan civitas akademik universitas. Semua pihak yang berkepentingan dengan dunia pendidikan terutama yang berlangsung di universitas ini seperti dosen, tenaga kependidikan, dan mahasiswa dapat mengakses berbagai informasi yang disediakan. Informasi tersebut antara lain tentang profile perpustakaan, daftar buku yang ada di perpustakaan, peminjaman buku di perpustakaan, dan berbagai informasi penting lainnya. Melalui website ini kami akan mengkomunikasikan bagaimana detak jantung kegiatan perpustakaan dalam rangka memberikan layanan pendidikan terbaik kepada civitas akademik universitas.
                      Mudah-mudahan kehadiran website ini akan memberikan manfaat kepada civitas akademik universitas dalam rangka memajukan pendidikan di Indonesia.
                      <br><br>
                      Wassalamu'alaikum Wr.Wb.</p><br>
            <footer class="blockquote-footer">Kepala Perpustakaan MCU <cite title="Source Title"></cite></footer>
                 
          </div>
          <br>

      
    </section>
    <!-- End Services Section -->

    
    @endsection