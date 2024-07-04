@extends('layout')
@section('main')


<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registered Users') }}
            </h2>
        </x-slot>
    
        <div class="container col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1></h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
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
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('m,y') }}</td>
                            <td>@if($user->status==1)
                              <b class="alert-success">Active</b>
                                @else
                                <b class="alert-danger">Disabled</b>
                                @endif 
                            </td>
                            <td>
                                <form action="{{ route('user.enable', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Enable</button>
                                </form>
                            </td>    
                            <td>    
                                <form action="{{ route('user.disable', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Disable</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table> 
        </div>
       
    </x-app-layout>
    
</div>
@endsection