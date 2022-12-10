@section('title')
Manage Users
@endsection
@extends('layout/v_template')
@section('page')
Add User
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
            <h3 class="card-title">User Add Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-user" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                <label for="inputName5" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="inputName5" name="name" value="{{ old('name')}}" placeholder="Enter Full Name...">
                <div class="text-danger">
                @error('name')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail5" name="email" value="{{ old('email')}}" placeholder="Enter Email Adress...">
                <div class="text-danger">
                  @error('email')
                    {{ $message}}
                  @enderror 
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword5" name="password" value="{{ old('password')}}" placeholder="Enter Password...">
                <div class="text-danger">
                  @error('password')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Photo</label>
                <input type="file" class="form-control" id="inputCity" name="photo" value="{{ old('photo')}}" placeholder="Enter Photo...">
                <div class="text-danger">
                  @error('photo')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Role</label>
                <select id="inputState" class="form-select" name="level" value="{{ old('level')}}" placeholder="Enter Role...">
                  <option>Choose...</option>
                  <option value="1">Admin</option>
                  <option value="2">Non Admin</option>
                </select>
                <div class="text-danger">
                  @error('level')
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

