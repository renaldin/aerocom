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
 
  <!-- ======= Portfolio Section ======= -->
  <section id="news" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>News</h2>
        <p>Kami tampilkan semua berita. Berita ini merupakan berita informasi tentang PT. Aerocomm.</p>
      </div>

      <div class="row portfolio-container">
        
        @foreach ($news as $item)
          <div class="col-lg-3 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <center>
              <img src="{{ asset('foto_news/'.$item->news_image) }}" width="220px" height="220px" alt="">
              <div class="portfolio-info">
                <h4>{{ $item->title }}</h4>
                <p>{{ $item->date }}</p>
                <div class="portfolio-links">
                  <a href="/landing-news/{{ $item->id_news }}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
              </center>
            </div>
          </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Portfolio Section -->

@endsection