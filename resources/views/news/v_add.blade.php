@section('title')
Manage News
@endsection
@extends('layout/v_template')
@section('page')
Add News
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
            <h3 class="card-title">News Add Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/insert-news" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputName5" name="title" value="{{ old('title')}}" placeholder="Enter Title...">
                <div class="text-danger">
                @error('title')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Publication Date</label>
                <input type="date" class="form-control" id="inputName5" name="date" value="{{ old('date')}}" placeholder="Enter Date...">
                <div class="text-danger">
                @error('date')
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
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Image</label>
                <input type="file" class="form-control" id="inputCity" name="news_image" value="{{ old('news_image')}}" placeholder="Enter Image...">
                <div class="text-danger">
                  @error('news_image')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <label for="inputState" class="form-label">News</label>
                <textarea name="news" class="form-control" id="summernote">
                  
                </textarea>
                <div class="text-danger">
                  @error('news')
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

