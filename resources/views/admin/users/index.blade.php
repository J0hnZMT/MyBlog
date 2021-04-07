
@extends('layouts.dashboard')

@section('content')
@include('includes.sidebaruser')
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Users</a>
          </div>
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button> -->
          <div class="collapse navbar-collapse justify-content-end">
            <!-- Search bar -->
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <!-- End Search bar -->
            <ul class="navbar-nav">
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
                    
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link" href="#pablo" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                        </a> -->
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{asset(Auth::user()->profile->avatar)}}" alt="{{Auth::user()->name }}" width="35px" height="35px" style="border-radius: 50%"> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('users.profile')}}" class="dropdown-item">Profile</a>
                            <a href="{{route('settings')}}" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
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
      <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title ">Registered Users</h4>
                    <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>
                                    <div class="text-center">
                                        Image
                                    </div>
                                </th>
                                <th>
                                    <div class="text-center">
                                        Name
                                    </div>
                                </th>
                                <th>
                                    <div class="text-center">
                                        Permissions
                                    </div>
                                </th>
                                <th>
                                    <div class="text-center">
                                        Archive
                                    </div>
                                </th>
                            </thead>
                        <tbody>
                            @if($users->count() > 0)
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td class="text-center">
                                        <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="60px" height="60px" style="border-radius: 50%">
                                        </td>
                                        <td class="text-center">
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            @if($user->admin)
                                                <a href="{{route('users.not.admin',['id'=>$user->id])}}" class="btn btn-danger btn-link btn-sm">Remove Permission</a>
                                            @else
                                                <a href="{{route('users.admin',['id'=>$user->id])}}" class="btn btn-primary btn-link btn-sm">Add Permission</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::id() !== $user->id)
                                                <a href="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-danger btn-link btn-sm"><i class="material-icons">delete</i></a>
                                            @else
                                                <b class="btn btn-danger btn-link btn-sm">You can't delete your own account</b>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="5" class="text-center ">No registered User yet.</th>
                                </tr>
                            @endif
                            
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
<div class="create_function">
        <div class="">
        <a href="{{route('users.create')}}">
            <i class="fa fa-plus fa-2x"> </i>
        </a>
        </div>
    </div>