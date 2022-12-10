@section('title')
Manage Products
@endsection
@extends('layout/v_template')
@section('page')
Edit Product
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
            <h3 class="card-title">Product Edit Form</h3>
          </div>
          <div class="card-body">
            <!-- Multi Columns Form -->
            <form class="row g-3" action="/update-product/{{$product->id_products}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="inputName5" name="products_name" value="{{ $product->products_name }}" placeholder="Enter Product Name...">
                <div class="text-danger">
                @error('products_name')
                  {{ $message}}
                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Categorie Name</label>
                <select id="inputState" class="form-select" name="id_categories"">
                  <option value="{{ $product->id_categories }}">{{ $product->categories_name }}</option>
                  @foreach ($categories as$item )
                    <option value="{{ $item->id_categories }}">{{ $item->categories_name }}</option>
                  @endforeach
                </select>
                <div class="text-danger">
                  @error('id_categories')
                    {{ $message}}
                  @enderror 
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Image</label>
                <input type="file" class="form-control" id="inputCity" name="image" value="{{ $product->image }}" placeholder="Enter Image...">
                <div class="text-danger">
                  @error('image')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Product Image</label>
                <div class="row">
                  <div class="col-12">
                    <img src="{{url('foto_product/'.$product->image)}}" width="100px">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5">{{$product->description}}</textarea>
                <div class="text-danger">
                  @error('description')
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

