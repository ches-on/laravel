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
        <h1 class="m-0">Search results </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">results </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('body')
{{-- <table class="table table-bordered">
    <thead>
        <tr>

            <th>Title</th>
            <th>Created at</th>
            <th>Author</th>
            <th>Posted By</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('m,y')}}</td>
                <td>{{$post->author}}</td>
                <td>{{ $post->user->name}}</td>
        @endforeach
    </tbody>
</table> --}}


<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Resaults</h3>

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
                  </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                      <tr>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->created_at->format('m,y')}}</td>
                          <td>{{$post->author}}</td>
                          <td>{{ $post->user->name}}</td>
                  @endforeach
              </tbody>
          </table>
          </div>
          <p style="height: 10px;">{{$posts->links()}}</p>
          <!-- /.card-body -->
          <div class="card-footer">
            Search results
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
@endsection


