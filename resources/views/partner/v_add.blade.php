@section('title')
Manage Partner
@endsection
@extends('layout/v_template')
@section('page')
Add Partner
@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>@yield('title')</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">@yield('title')</a></li>
        <li class="breadcrumb-item active">@yield('page')</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card p-3">
          <div class="card-header">
            <h3 class="card-title">Partner Add Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-partner" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Partner Name</label>
                <input type="text" class="form-control" id="inputName5" name="partner_name" value="{{ old('partner_name')}}" placeholder="Enter Partner Name...">
                <div class="text-danger">
                @error('partner_name')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-12">
                <label for="inputCity" class="form-label">Partner Image</label>
                <input type="file" class="form-control" id="inputCity" name="partner_image" value="{{ old('partner_image')}}" placeholder="Enter Partner Image...">
                <div class="text-danger">
                  @error('partner_image')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

