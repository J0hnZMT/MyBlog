
@extends('layouts.dashboard')

@section('content')
@include('includes.sidebarcat')
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Categories</a>
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
                    <h4 class="card-title ">Category List</h4>
                    <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <thead class=" text-primary text-center">
                            <th>
                            Name
                            </th>
                            <th>
                            Edit
                            </th>
                            <th>
                            Delete
                            </th>
                        </thead>
                        <tbody>
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-primary btn-link btn-sm"><i class="material-icons">edit</i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                            <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger btn-link btn-sm"><i class="material-icons">delete</i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="5" class="text-center ">No Categories Yet.</th>
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
@section('create')
<div class="create_function">
        <div class="">
        <a href="{{route('category.create')}}">
            <i class="fa fa-plus fa-2x"> </i>
        </a>
        </div>
    </div>
@stop