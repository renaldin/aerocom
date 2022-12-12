<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <a href="#hero" class="logo"><img src="{{ asset('landing') }}/assets/img/logo.png" alt="" class="img-fluid"></a> --}}
      <a href="#hero" class="logo"><img src="{{ asset('gambar/logo.png') }}" alt="" class="img-fluid">&nbsp;&nbsp;&nbsp;PT. Aerocomm</a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          @if($heroTitle === 'Landing Page')
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li class="dropdown"><a href="#product"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                @foreach ($categories as $item)
                <li><a href="/product-by-categories/{{ $item->id_categories }}">{{ $item->categories_name }}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#partner">Partner</a></li>
            <li><a class="nav-link scrollto" href="{{ route('landing-news') }}">News</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          @else
            <li><a class="nav-link scrollto active" href="{{ route('landing') }}">Kembali ke Landing Page</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->