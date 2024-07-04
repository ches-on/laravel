@extends('layout')
@section('header')
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
@endsection
@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
 
    
    <div class="container mt-3">
                   
        </div>
        <div class="">
            @foreach ($posts as $post)
            <article class="mb-5">
                <h2 >{{$post->title}}</h2>
                <p class="text-muted"><strong>Posted on</strong> {{$post->created_at->format('m,y')}} <br><strong>Written By</strong> {{$post->author}} <br>  <strong>Posted by:</strong> {{ $post->user->name }}</p>
                <p>{!! Str::limit($post->content, 100) !!}</p>
                <a href="{{route('blog.show', $post->id)}}" class="btn btn-primary">Read More</a>
            </article>
            @endforeach
        </div>
        {{-- @livewire('page-component') --}}
        {{$posts->links()}}
        {{-- <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">About Me</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet ligula at dui cursus, et egestas libero aliquam.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 2</a></li>
                        <li><a href="#">Category 3</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</main>
    
@endsection