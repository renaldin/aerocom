@section('title')
PT. Aerocomm
@endsection
@extends('layout/v_templateLanding')
@section('page')
News
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

        <div class="col-lg-2"></div>

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="">
                <img src="{{ asset('foto_news/'.$news->news_image) }}" alt="{{ $news->title }}">
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-2"></div>

      </div>

      <div class="row gy-4">

        <div class="col-lg-12">
          <div class="portfolio-info">
            <h3>{{$news->title}}</h3>
            <ul>
              <li><strong>Author</strong>: {{ $news->name }}</li>
              <li><strong>Publication Date</strong>: {{ $news->date }}</li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>News</h2>
            <p>
              {{ $news->news }}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->


@endsection