
   

@extends('admin.main-layout')
@section('content-header')
    <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">New User </li>
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
            <h3 class="card-title">Add User</h3>

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
            <form method="POST" action="{{ route('register') }}">
              @csrf
          
              <!-- Name -->
              <div>
                  <label for="name" >Name<br>
                  <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  
              </div>
          
              <!-- Email Address -->
              <div class="mt-4">
                  <x-input-label for="email" :value="__('Email')" /> <br>
                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
          
              <!-- Password -->
              <div class="mt-4">
                  <x-input-label for="password" :value="__('Password')" /><br>
          
                  <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />
          
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
          
              <!-- Confirm Password -->
              <div class="mt-4">
                  <x-input-label for="password_confirmation" :value="__('Confirm Password')" /><br>
          
                  <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />
          
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>
          
              {{-- <div class="flex items-center justify-end mt-4">
                  <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                      {{ __('Already registered?') }}
                  </a> --}}
          
                 <br> <button class="btn btn-primary ms-4">
                      {{ __('Register') }}
                  </button>
              </div>
          </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            User Registration
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
@endsection