
@extends('layouts.dashboard')

@section('content')

@include('includes.sidebarpost')

<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Post</a>
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
                <h4 class="card-title">New Post</h4>
                  <p class="card-category">Complete your new post</p>
                </div>
                <div class="card-body">
                @include('admin.includes.errors')
                  <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" hidden value="{{Auth::user()->id}}" name="user_id"  class="form-control">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-file-upload form-file-multiple">
                          <label class="bmd-label-floating">Featured Image</label>
                          <input type="file" name="featured" class="inputFileHidden" id="featured">
                          <div class="input-group">
                            <input type="text"  class="form-control inputFileVisible" placeholder="Upload Image" required>
                              <span class="input-group-btn">
                                <button class="btn btn-fab btn-fab-mini btn-primary" type="button">
                                  <i class="material-icons">attach_file</i>
                                </button>
                              </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="category" class="bmd-label-floating">Select your Category here:</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="tags">Select tags:</label>
                            @foreach($tags as $tag)
                                <div class="col-sm-6">
                                    <div class="checkbox">
                                        <label for="tag"><input type="checkbox" value="{{$tag->id}}" name="tags[]"> {{$tag->tag}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label>Content</label>
                            <label class="bmd-label-floating"> </label>
                            <textarea class="form-control" cols="6" rows="6" name="content" id="content"></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Upload Post</button>
                        </div>
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  </form>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@stop

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script> 
@stop
