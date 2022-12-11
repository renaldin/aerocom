@section('title')
PT. Aerocomm
@endsection
@extends('layout/v_templateLanding')
@section('page')
Landing Page
@endsection
@section('content')
  
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
          <img src="{{ asset('gambar/about.png') }}" width="100%" height="100%" alt="About Image">
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h3>Rekam Jejak</h3>
          <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Legalitas : didirikan sejak 2004 dengan Akta Notarism</a></h4>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Proyek awal dari Telekomunikasi</a></h4>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Kemudian berlanjut di Transportasi sebagai penyedia Perangkat GPS Announcer dan Speedometer</a></h4>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Berlanjut dengan Perangkat IoT untuk Energy Metering 3 Phase</a></h4>
          </div>

          <div class="icon-box">
            <div class="icon"><i class="bx bx-atom"></i></div>
            <h4 class="title"><a href="">Sekarang IoT untuk berbagai kepentingan</a></h4>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Gallery Section ======= -->
  <section id="product" class="gallery">
    <div class="container">

      <div class="section-title">
        <h2>Product</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row no-gutters">

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{ asset('landing') }}/assets/img/gallery/gallery-1.jpg" class="galleery-lightbox" data-gallery="gallery-item">
              <img src="{{ asset('landing') }}/assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{ asset('landing') }}/assets/img/gallery/gallery-2.jpg" class="galleery-lightbox" data-gallery="gallery-item">
              <img src="{{ asset('landing') }}/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{ asset('landing') }}/assets/img/gallery/gallery-3.jpg" class="galleery-lightbox" data-gallery="gallery-item">
              <img src="{{ asset('landing') }}/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{ asset('landing') }}/assets/img/gallery/gallery-4.jpg" class="galleery-lightbox" data-gallery="gallery-item">
              <img src="{{ asset('landing') }}/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Gallery Section -->


  <!-- ======= Team Section ======= -->
  <section id="partner" class="clients">
    <div class="container">

      <div class="section-title">
        <h2>Partner</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

        @foreach ($partner as $item)
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="{{ asset('foto_partner/'.$item->partner_image) }}" class="img-fluid" alt="{{ $item->partner_name }}">
            </div>
          </div>
        @endforeach

      </div>


    </div>
  </section><!-- End Team Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="news" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>News</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="{{ asset('landing') }}/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <div class="portfolio-links">
                <a href="{{ asset('landing') }}/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="{{ asset('landing') }}/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <div class="portfolio-links">
                <a href="{{ asset('landing') }}/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="{{ asset('landing') }}/assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <div class="portfolio-links">
                <a href="{{ asset('landing') }}/assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact Us</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Jl. Kihiur 44 Bandung - Indonesia-40114</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>aerocomm.rnd@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Whatsapp:</h4>
              <p>+62 896 6943 1036 dan +62 812-2178-6610</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8601072731635!2d107.62666121427557!3d-6.907326369518358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c9e76a2c97%3A0x881503b931bde4a2!2sJl.%20Kihiur%20No.44%2C%20Cihapit%2C%20Kec.%20Bandung%20Wetan%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040114!5e0!3m2!1sid!2sid!4v1670702069504!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection