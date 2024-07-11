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
        <h1 class="m-0">Posts</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Posts </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
    </div>
@endsection
@section('body')
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif



          </div>
          <div class="card-body">

        <form method="POST" action="{{ route('post.update', $post->id) }}">
          @csrf
          @method('POST')
          <div class="mb-3">
            <label for="title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{$post->title}}">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">{{ __('Content') }}</label>
            <textarea class="form-control" id="contents" name="content" rows="10" required>{{$post->content}}</textarea>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">{{ __('Author') }}</label>
            <input type="text" class="form-control" id="author" name="author" required value="{{$post->author}}">
          </div>
          <button type="submit" class="btn btn-primary rounded">{{ __('Submit') }}</button>
        </form>

          </div>
          {{-- <p style="height: 10px;">{{$posts->links()}}</p> --}}
          <!-- /.card-body -->
          <div class="card-footer">
            Creating post
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>



{{-- editing form --}}


</section>

@endsection
