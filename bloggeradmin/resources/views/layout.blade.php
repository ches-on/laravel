<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
@yield('header')
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p class="nav-item text-grey-600" style='text-align:center; font-size:20px' >Lets blog</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style='color:white' aria-current="page" href="{{route('welcome')}}">Home</a>
                        </li>
                        @auth
                        <li class="nav-item">
                        <a class="nav-link" style='color:white' href="{{route('userdashboard')}}">Dashboard</a>
                        </li> 
                         @endauth
                        <li class="nav-item">
                            <a class="nav-link" style='color:white' href="{{route('about.show')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style='color:white' href="/contact">Contact</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" style='color:white' href="{{route('login')}}">Login</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" style='color:white' href="{{route('register')}}">Register</a>
                        </li> --}}
                        
                        @endguest
                        @auth
                        
                        {{-- <li class="nav-item">
                            <a class="nav-link" style='color:white' href="{{url('users')}}">Users</a>
                        </li> --}}
                        <li class="nav-item">
                            <form method="POST" style='text-decoration:none; color:white' action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link style='text-decoration:none; color:white' :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form> 
                        </li>
                         @endauth
                    </ul>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            @yield('main')
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; Justus. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
