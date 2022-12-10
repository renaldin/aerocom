@section('title')
Manage News
@endsection
@extends('layout/v_template')
@section('page')
Detail News
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
            <h3 class="card-title">News Detail</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3">
              @csrf
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputName5" name="title" value="{{ $news->title }}" placeholder="Enter Title..." disabled>
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Publication Date</label>
                <input type="date" class="form-control" id="inputName5" name="date" value="{{ $news->date }}" placeholder="Enter Date..." disabled>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Status</label>
                <input type="text" class="form-control" id="inputName5" name="status" value="{{ $news->status }}" placeholder="Enter Date..." disabled>
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Image</label>
                <div class="row">
                  <div class="col-12">
                    <img src="{{url('foto_news/'.$news->news_image)}}" width="100px">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <label for="inputState" class="form-label">News</label>
                <div class="row">
                  <div class="col-md-12">
                    <?php echo $news->news?>
                  </div>
                </div>
              </div>
            </form><!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

