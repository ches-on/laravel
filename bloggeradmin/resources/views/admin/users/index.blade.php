@extends('admin.main-layout')
@section('header')
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{route('logout')}}" class="dropdown-item">
            Logout
          </a>
        </div>
      </li>
    </ul>
</nav>

@endsection
@section('content-header')
    <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
    </div>
@endsection
@section('body')
<div class="">
    <h1></h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">System Users</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>

                </div> <br>

              </div>
              <div class="card-body">
                  <button type="button" class="btn btn-success float-sm-right mb-1 mt-n3" data-toggle="modal" data-target="#registerModal" style="">
                  Add user
               </button>
                <table class="table table-bordered">
                  <thead>
                      <tr>

                          <th>Name</th>
                          <th>Email</th>
                          <th>Registered At</th>
                          <th>Status</th>
                          <th class="col-span-2">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                          <tr>

                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->created_at->format('d,m,y') }}</td>
                              <td>@if($user->status==1)
                                <b class="text-success">Active</b>
                                  @else
                                  <b class="text-danger">Disabled</b>
                                  @endif
                              </td>
                              <td>
                                  @if($user->status==0)
                                  <form action="{{ route('user.enable', $user->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-success">Enable</button>
                                  </form>
                                  @else
                                  <form action="{{ route('user.disable', $user->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-danger">Disable</button>
                                  </form>
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              </div>
              {{-- <p style="height: 10px;">{{$users->links()}}</p>  --}}
              <!-- /.card-body -->
              <div class="card-footer">
                Registered Users
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>



    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerModalLabel">Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <!-- Name -->
              <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
              </div>

              <!-- Email Address -->
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <!-- Password -->
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <!-- Confirm Password -->
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
