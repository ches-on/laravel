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
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" action="{{route('adsearch')}}" method="GET">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>

        <span>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{route('logout')}}" class="dropdown-item">
              Logout
            </a>
          </div>
        </span>
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
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content-header">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$countposts}}</h3>

            <p>Posts</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('post.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$users}}</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$contacts}}</h3>

            <p>User Inquiries</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{route('inquiry.show')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
   <!-- /.row -->
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
              <h3 class="card-title"> Latest</h3>

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
                  <table class="table table-bordered">
              <thead>
                  <tr>

                      <th>Title</th>
                      <th>Created at</th>
                      <th>Author</th>
                      <th>Posted By</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                      <tr>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->created_at->format('m,y')}}</td>
                          <td>{{$post->author}}</td>
                          <td>{{ $post->user->name}}</td>
                          <td>

                            <a href="#" data-toggle="modal" data-target="#editFormModal">
                              <i class="fas fa-edit" style="color:green"></i>
                            </a>

                            <a href="{{route('post.delete', $post->id)}}"  class="fa fa-trash" style="color:red; margin-left:5%"></a></i>
                            <a href="{{route('post.more',$post->id)}}" class="far fa-arrow-alt-circle-right"></a>
                          </td>
                  @endforeach
              </tbody>
          </table>
            </div>

            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  {{-- editing form --}}
<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFormModalLabel">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('post.update', $post->id) }}">
          @csrf
          @method('POST')
          <div class="mb-3">
            <label for="title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ $post->title }}">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">{{ __('Content') }}</label>
            <textarea class="form-control" id="contents" name="content" rows="10" required>{!! $post->content !!}</textarea>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">{{ __('Author') }}</label>
            <input type="text" class="form-control" id="author" name="author" required value="{{ $post->author }}">
          </div>
          <button type="submit" class="btn btn-primary rounded">{{ __('Submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


