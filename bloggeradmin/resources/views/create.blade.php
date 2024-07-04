


@extends('layout')
@section('main')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight justify-content-center">
                {{ __('Operations') }}
            </h2>
        </x-slot>
    
        <div >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary" style='text-align:center; color:white; font-size:20px'>CREATE A POST</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{route('post.store')}}">
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
            </div>
        </div>
        <script>
            CKEDITOR.replace('content');
        </script>
    </x-app-layout>
    
</div>
@endsection
