@extends('admin.main-layout')
@section('content-header')
    <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">filter</li>
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
            <h3 class="card-title">Filter </h3>

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
            <form action="" method="get">
              <div class="row mb-2">
                <div class="col-md-3">
                <label for="">Filter by Date</label>
                <input type="date" name="date" value="{{Request::get('date')??date('y-m-d')}}" class="form-control">
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </div>
            </form>
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
                          <td>{{ $post->created_at->format('d,m,y')}}</td>
                          <td>{{$post->author}}</td>
                          <td>{{ $post->user->name}}</td>
                          <td>

                            {{-- <a href="#" data-toggle="modal" data-target="#editFormModal">
                              <i class="fas fa-edit" style="color:green"></i>
                            </a> --}}
                            <a href="{{route('post.delete', $post->id)}}"  class="fa fa-trash" style="color:red; margin-left:5%"></a></i>
                          </td>
                  @endforeach
              </tbody>
          </table>


          </div>
          <p style="height: 10px"> {{$posts->links()}}</p>
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


  <!-- add post form -->
{{-- <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('post.store') }}">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">{{ __('Content') }}</label>
            <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">{{ __('Author') }}</label>
            <input type="text" class="form-control" id="author" name="author" required>
          </div>
          <button type="submit" class="btn btn-primary rounded">{{ __('Submit') }}</button>
        </form>
      </div>
    </div>
  </div>
</div> --}}

{{-- editing form --}}
{{-- <div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
            <textarea class="form-control" id="content" name="content" rows="10" required>{!! $post->content !!}</textarea>
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
</div> --}}

</section>
      <script>
          CKEDITOR.replace('content');
      </script>

</div>
@endsection
