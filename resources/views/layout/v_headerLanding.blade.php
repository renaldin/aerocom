<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <a href="#hero" class="logo"><img src="{{ asset('landing') }}/assets/img/logo.png" alt="" class="img-fluid"></a> --}}
      <a href="#hero" class="logo">PT. Aerocomm</a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li class="dropdown"><a href="#product"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach ($categories as $item)
                    <li><a href="#">{{ $item->categories_name }}</a></li>
                @endforeach
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#partner">Partner</a></li>
          <li><a class="nav-link scrollto" href="#news">News</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->