<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (Route::has('login'))  
            @auth
                {{ $settings->site_name }}
        @else
                Account Registration
            @endauth           
        @endif 
    </title>
    @toastr_css
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    @if (Route::has('login'))  
                        @auth
                        <a class="navbar-brand" href="{{ route('index') }}">{{ $settings->site_name }}</a>
                        @else
                            Home 
                        @endauth
                    @endif
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <img src="{{asset(Auth::user()->profile->avatar)}}" alt="{{Auth::user()->name }}" width="35px" height="35px" style="border-radius: 50%">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{route('users.profile')}}" class="dropdown-item">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @if(Auth::check())
                        <div class="col-lg-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{route('home')}}"> Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('categories')}}"> Categories</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('posts')}}"> Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('tags')}}"> Tags</a>
                                </li>
                                @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('users')}}"> Users</a>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{route('category.create')}}"> Create new category</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('post.create')}}"> Create new post</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('tag.create')}}"> Create new tag</a>
                                </li>
                                @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('users.create')}}"> Create new user</a>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{route('post.trash')}}"> Trashed post</a>
                                </li>
                                @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('settings')}}"> Settings</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
@yield('scripts')  
</body>

@jquery
@toastr_js
@toastr_render
</html>
