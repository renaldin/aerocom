@section('title')
Dashboard
@endsection
@extends('layout/v_template')
@section('page')
Dashboard Admin
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
        <li class="breadcrumb-item active">@yield('page')</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-9">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Number of Users</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $users }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Number of Categories</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-intersect"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $categories }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Number of Products</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-layers"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $products }}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="card-body">
                <div class="row">
                  <div class="col-xxl-8 col-md-6 d-flex align-items-center justify-content-center ">
                    <img src="{{ asset('layout') }}/assets/img/logo.png" alt="Logo" width="100px">
                  </div>
                  <div class="col-xxl-4 col-md-6">
                    <div class="info-card sales-card">

                      <div class="card-body">
                        <h5 class="card-title">Number of News</h5>
        
                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-boxes"></i>
                          </div>
                          <div class="ps-3">
                            <h6>{{ $products }}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xxl-12 col-md-12">
                    <h3><strong>Welcome renaldi</strong></h3>
                    <h5 >Welcome to the website of PT. Aerocomm. You are currently on the website of PT. Aerocomm, Admin section.</h5>
                  </div>

                </div>
              </div>

            </div>
          </div><!-- End Reports -->
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-3">

        <!-- Recent Activity -->
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Latest News</h5>

            <div class="activity">

              @foreach ($news as $item)
              <div class="activity-item d-flex">
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  {{ $item->title }}
                </div>
              </div>
              @endforeach

            </div>

          </div>
        </div><!-- End Recent Activity -->
      </div><!-- End Right side columns -->

    </div>
  </section>

</main>
@endsection

