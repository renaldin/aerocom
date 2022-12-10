@section('title')
Manage Users
@endsection
@extends('layout/v_template')
@section('page')
Data Users
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
            <h3 class="card-title">Data Users</h3>
            <a href="/add-user" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Add Data</a>
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
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($users as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                      <img src="{{url('foto_user/'.$item->photo)}}" width="100px">
                    </td>
                    <td>
                      @if (Auth::user()->id === $item->id)
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-info"><i class="bi bi-pencil"></i></button>
                      @else
                        <a href="/edit-user/{{$item->id}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                      @endif
                      @if (Auth::user()->id === $item->id)
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-info"><i class="bi bi-trash"></i></button>
                      @else
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}"><i class="bi bi-trash"></i></butt>
                      @endif
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

<div class="modal fade" id="modal-info" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        You cannot delete or edit this data, because this data is your own data!!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->

{{-- Modal Delete --}}
@foreach ($users as $item)
<div class="modal fade" id="delete{{$item->id}}" tabindex="-1">
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
        <a href="/delete-user/{{$item->id}}" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach
@endsection

