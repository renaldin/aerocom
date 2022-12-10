@section('title')
Manage Products
@endsection
@extends('layout/v_template')
@section('page')
Data Products
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
            <h3 class="card-title">Data Products</h3>
            <a href="/add-product" class="btn btn-primary" style="float: right"><i class="bi bi-plus-circle-fill"></i> Add Data</a>
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
                  <th>Products Name</th>
                  <th>Categories Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;?>
                @foreach ($products as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->categories_name }}</td>
                    <td>{{ $item->products_name }}</td>
                    <td>
                      <img src="{{url('foto_product/'.$item->image)}}" width="100px">
                    </td>
                    <td>
                      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_products}}"><i class="bi bi-eye"></i></button>
                      <a href="/edit-product/{{$item->id_products}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id_products}}"><i class="bi bi-trash"></i></butt>
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

@foreach ($products as $item)
<div class="modal fade" id="detail{{$item->id_products}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <label for="inputName5" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="inputName5" name="products_name" value="{{ $item->products_name }}" disabled>
          </div>
          <div class="col-md-6">
            <label for="inputEmail5" class="form-label">Categorie Name</label>
            <input type="text" class="form-control" id="inputName5" name="id_categories" value="{{ $item->categories_name }}" disabled>
          </div>
          <div class="col-md-12">
            <label for="inputCity" class="form-label">Image</label>
            <div class="row">
              <div class="col-12">
                <img src="{{url('foto_product/'.$item->image)}}" width="100px">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label for="inputState" class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="5" disabled>{{ $item->description }}</textarea>
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
@foreach ($products as $item)
<div class="modal fade" id="delete{{$item->id_products}}" tabindex="-1">
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
        <a href="/delete-product/{{$item->id_products}}" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endforeach

@endsection

