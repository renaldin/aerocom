@section('title')
Manage News
@endsection
@extends('layout/v_template')
@section('page')
Data News
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
      <div class="col-lg-12">
        <div class="card p-3">
          <div class="card-header">
            <h3 class="card-title">Data News</h3>
            <a href="/add-news" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Add Data</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              @if (session('pesan'))
              <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Publication Date</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($news as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                      <img src="{{url('foto_news/'.$item->news_image)}}" width="100px">
                    </td>
                    <td>
                      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_news}}"><i class="bi bi-eye"></i></button>
                      <a href="/edit-news/{{$item->id_news}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id_news}}"><i class="bi bi-trash"></i></butt>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
  </section>

</main>

@foreach ($news as $item)
<div class="modal fade" id="detail{{$item->id_news}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <label for="inputName5" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputName5" name="title" value="{{ $item->title }}" disabled>
          </div>
          <div class="col-md-6">
            <label for="inputName5" class="form-label">Publication Date</label>
            <input type="text" class="form-control" id="inputName5" name="date" value="{{ $item->date }}" disabled>
          </div>
          <div class="col-md-6">
            <label for="inputEmail5" class="form-label">Status</label>
            <input type="text" class="form-control" id="inputName5" name="status" value="{{ $item->status }}" disabled>
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">Image</label>
            <div class="row">
              <div class="col-12">
                <img src="{{url('foto_news/'.$item->news_image)}}" width="100px">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label for="inputState" class="form-label">News</label>
            <textarea name="news" class="form-control" cols="30" rows="5" disabled>{{ $item->news }}</textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>
@endforeach

{{-- Modal Delete --}}
@foreach ($news as $item)
<div class="modal fade" id="delete{{$item->id_news}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="/delete-news/{{$item->id_news}}" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach

@endsection

