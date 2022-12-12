@section('title')
PT. Aerocomm
@endsection
@extends('layout/v_templateLanding')
@section('page')
Product
@endsection
@section('content') 
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>@yield('page')</h2>
        <ol>
          <li><a href="#">@yield('title')</a></li>
          <li>@yield('page')</li>
        </ol>
      </div>

    </div>
  </section>
  <!-- ======= Gallery Section ======= -->
  <section id="product" class="gallery">
    <div class="container">

      <div class="section-title">
        <h2>Product</h2>
      </div>

      <div class="row no-gutters">

        @foreach ($product as $item)
          <div class="col-md-4 col-xs-6 mb-4">
            <div class="gallery-item">
                <center>
                    <a href="/product-detail/{{ $item->id_products }}" class="galleery-lightbox" data-gallery="gallery-item">
                        <img src="{{ asset('foto_product/'.$item->image) }}" alt="" width="220px" height="220px">
                    </a>
                    <h4><strong>{{ $item->products_name }}</strong></h4>
                </center>
            </div>
          </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Gallery Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact Us</h2>
        <p></p>
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