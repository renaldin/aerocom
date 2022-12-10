@section('title')
My Profile
@endsection
@extends('layout/v_template')
@section('page')
My Profile
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

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('foto_user/'.$user->photo) }}" alt="Profile" class="rounded-circle">
            <h2>{{ $user->name }}</h2>
            <h3>
              <?php if (Auth::user()->level == 1) { ?>
                <span>Admin</span>
              <?php } else if(Auth::user()->level == 2) {?>
                <span>User</span>
              <?php } else if(Auth::user()->level == 3) {?>
                <span>Mahasiswa</span>
              <?php } else if(Auth::user()->level == 4) {?>
                <span>Dosen</span>
              <?php }?>
            </h3>
          </div>
        </div>

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column">

            @if (session('pesanPassword'))
            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
              {{ session('pesanPassword') }}
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('notPassword'))
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
              {{ session('notPassword') }}
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form class="row g-3" action="/update-password/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- <div class="col-md-12">
                <label for="inputPassword5" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="inputPassword5" name="currentPassword" value="{{old('currentPassword')}}" placeholder="Enter Current Password...">
                <div class="text-danger">
                  @error('currentPassword')
                    {{ $message}}
                  @enderror
                </div>
              </div> --}}
              <div class="col-md-12">
                <label for="inputPassword5" class="form-label">New Password</label>
                <input type="password" class="form-control" id="inputPassword5" name="newPassword" value="{{ old('newPassword') }}" placeholder="Enter New Password...">
                <div class="text-danger">
                  @error('newPassword')
                    {{ $message}}
                  @enderror
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>
           
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">
                    <?php if (Auth::user()->level == 1) { ?>
                      <span>Admin</span>
                    <?php } else if(Auth::user()->level == 2) {?>
                      <span>User</span>
                    <?php } else if(Auth::user()->level == 3) {?>
                      <span>Mahasiswa</span>
                    <?php } else if(Auth::user()->level == 4) {?>
                      <span>Dosen</span>
                    <?php }?>
                  </div>
                </div>

                <h5 class="card-title">Edit Profile</h5>
                @if (session('pesan'))
                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                  {{ session('pesan') }}
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form class="row g-3" action="/update-profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="inputName5" name="name" value="{{$user->name}}" placeholder="Enter Full Name...">
                    <div class="text-danger">
                    @error('name')
                      {{ $message}}
                    @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail5" name="email" value="{{$user->email}}" placeholder="Enter Email Adress...">
                    <div class="text-danger">
                      @error('email')
                        {{ $message}}
                      @enderror 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="inputCity" name="photo" value="{{$user->photo}}" placeholder="Enter Photo...">
                    <div class="text-danger">
                      @error('photo')
                        {{ $message}}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img src="{{url('foto_user/'.$user->photo)}}" width="100px">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form>

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection

