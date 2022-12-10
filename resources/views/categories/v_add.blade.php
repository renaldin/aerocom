@section('title')
Manage Categories
@endsection
@extends('layout/v_template')
@section('page')
Add Categories
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
            <h3 class="card-title">Categories Add Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-categories" method="POST">
              @csrf
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Categories Name</label>
                <input type="text" class="form-control" id="inputName5" name="categories_name" value="{{old('categories_name')}}" placeholder="Enter Categories Name...">
                <div class="text-danger">
                @error('categories_name')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Status</label>
                <select id="inputState" class="form-select" name="status" value="{{old('status')}}" placeholder="Enter Status..." required>
                  <option>Choose...</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
                <div class="text-danger">
                  @error('status')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="text-center mt-5">
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

