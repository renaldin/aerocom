@section('title')
PT. Aerocomm
@endsection
@extends('layout/v_templateLanding')
@section('page')
Product Detail
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
  
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{ asset('foto_product/'.$product->image) }}" alt="{{ $product->products_name }}">
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>{{$product->products_name}}</h3>
            <ul>
              <li><strong>Category</strong>: {{ $product->categories_name }}</li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Description</h2>
            <p>
              {{ $product->description }}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->


@endsection