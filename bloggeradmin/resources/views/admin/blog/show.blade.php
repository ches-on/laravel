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
        <h1 class="m-0">Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('post.show')}}">Posts</a></li>
          <li class="breadcrumb-item active">Comment</li>
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
            <h3 class="card-title">{{ $post->title }} </h3>

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
            <p class="card-text">{!! \Illuminate\Support\Str::words($post->content, 50) !!}</p>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Comments</h4>
                        <div class="list-group">
                            @if($post->comments->isEmpty())
                                <p>No comments yet.</p>
                            @else
                                @foreach($post->comments as $comment)
                                    <div class="list-group-item">
                                        <h6 style="color:blue">@ {{ $comment->user->name }}</h6>
                                        <p>{{ $comment->comment }}</p>
                                        <small class="text-muted">Posted on {{ $comment->created_at->format('F d, Y \a\t h:i A') }}</small>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Related Posts</h3>
                        <ul>
                            @forelse ($relatedPosts as $relatedPost)
                                <li>
                                    <a style="color:black" href="{{ route('post.more', $relatedPost->id) }}">{{ $relatedPost->title }}</a>
                                </li>
                            @empty
                                <li>No related posts found.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>



          </div>
          {{-- <p style="height: 10px"> {{$posts->links()}}</p> --}}
          <!-- /.card-body -->
          <div class="card-footer">
          Posts
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>

</section>

</div>


@endsection
