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
        <h2>Product ({{$categories->categories_name}})</h2>
      </div>

      <div class="row no-gutters">

        @foreach ($product as $item)
          <div class="col-md-4 col-xs-6 mb-4">
            <div class="gallery-item">
                <center>
                    <a href="/product-detail/{{ $item->id_products }}" class=""">
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

@endsection