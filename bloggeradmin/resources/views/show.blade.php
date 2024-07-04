@extends('layout')

@section('main')
<div class="container col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
        <div>
            <div>
                @auth
                    @if(Auth::id() === $post->user_id)
                    <a href="{{route('post.edit', $post->id)}}" class='btn btn-success rounded'>Edit</a>
                    <form style='float:right' action="{{route('post.delete', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class='btn btn-danger rounded'>Delete</button>
                    </form>
                    @endif
                @endauth
                
            </div>
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                
                <div class="card-body">
                    
                    <p><strong>Author:</strong> {{ $post->author }}</p>
                    <p><strong>Posted by:</strong> {{ $post->user->name }}</p>
                    <p><strong>Posted on:</strong> {{ $post->created_at->format('M, Y') }}</p>
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
        <div>
            <h1>comments</h1>
            @if($post->comments->isEmpty())
            <p>No comments yet.</p>
        @else
            <div>
                @foreach($post->comments as $comment)
                <div>
                    <span style="color: blue; "><i><strong>@</strong></i> {{ $comment->user->name }}</span>
                    <i>==>{{ $comment->comment }}</i>
                </div>
             
                @endforeach
        </div>
        @endif
            @auth
            <form action="{{ route('comment.store', ['id' => $post->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
            @endauth
            
        </div>
</div>
@endsection
