@extends('layout')
@section('main')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Welcome') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div >
                        <ul class="nav flex-column">
                          
                            <button class="btn btn-primary btn-sm">
                                <a class="nav-link active" style='color:rgb(51, 30, 30)'  href="{{route('post.show')}}">New post</a>                             </button>
                            <button class="nav-item">
                                <a class="nav-link" style='color:rgb(51, 30, 30)' href="#">Create a category</a>
                            </button>
                         
                        </ul>
                </div>
            </div>
        </div>
       
    </x-app-layout>
    
</div>
@endsection
