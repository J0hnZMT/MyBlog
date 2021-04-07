@extends('layouts.dashboard')

@section('content')
@include('includes.sidebar')
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Dashboard</a>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">subject</i>
                  </div>
                  <p class="card-category">Posts</p>
                  <h3 class="card-title">{{$post_count}}</h3>
                </div>
                <div class="card-footer">
                  <!-- <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Get More Space...</a>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">category</i>
                  </div>
                  <p class="card-category">Categories</p>
                  <h3 class="card-title">{{$category_count}}
                  </h3>
                </div>
                <div class="card-footer">
                  <!-- <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">delete</i>
                  </div>
                  <p class="card-category">Trashed Post</p>
                  <h3 class="card-title">{{$trash_count}}</h3>
                </div>
                <div class="card-footer">
                  <!-- <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Users</p>
                  <h3 class="card-title">{{$user_count}}</h3>
                </div>
                <div class="card-footer">
                  <!-- <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Daily Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Email Subscriptions</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Completed Tasks</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="row">
            <div 
            @if(Auth::user()->admin)
            class="col-lg-6 col-md-12"
            @else
            class="col-lg-12 col-md-12"
            @endif
            >
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Tasks:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#task" data-toggle="tab">
                            <i class="material-icons">assignment</i> New Task
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#pending" data-toggle="tab">
                            <i class="material-icons">done</i> Tasks
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#done" data-toggle="tab">
                            <i class="material-icons">done_all</i> Completed
                            <div class="ripple-container"></div>
                          </a>
                        </li> -->
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">


                    <div class="tab-pane active" id="task">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <form action="{{route('todos.save',['id' => $todo->id])}}" method="post">
                                  {{ csrf_field() }}
                                  <input type="text" name="todos" class="form-control" value="{{ $todo->todos }}" required>
                                  <div class="form-group text-center">
                                      <button type="submit" class="btn btn-primary">Update Task</button>
                                  </div>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>


                    <div class="tab-pane" id="pending">
                      <table class="table">
                        <tbody class="text-center">
                        @if(Auth::user()->todo->count() > 0)
                            @foreach(Auth::user()->todo as $todo)
                                <tr>
                                  @if(!$todo->completed)
                                  <td>
                                    <div class="form-check"> 
                                        <label class="form-check-label">
                                          <a href="{{ route('todos.complete',['id' => $todo->id])}}">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                            <span class="check"></span>
                                            </span>
                                          </a>
                                        </label>
                                    </div> 
                                  </td>
                                  @else
                                  <td>
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" value="" checked disabled>
                                          <span class="form-check-sign">
                                            <span class="check"></span>
                                          </span>
                                        </label>
                                      </div>
                                  </td>
                                  @endif
                                <td>{{ $todo->todos }}</td> 
                                <td class="td-actions text-right">
                                <a href="{{route('todos.update',['id' => $todo->id])}}" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm"><i class="material-icons">edit</i></a>
                                <a href="{{route('todos.delete',['id' => $todo->id])}}" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm"><i class="material-icons">close</i></a>
                                </td>
                                </tr>
                            @endforeach
                          @else
                              <tr>
                                <td class="text-center">
                                  No task.
                                </td>
                              </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- <div class="tab-pane" id="done">
                      <table class="table">
                      <tbody>
                      @if(Auth::user()->todo->count() > 0)
                            @foreach(Auth::user()->todo as $todo)
                                <tr>
                                <td>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked disabled>
                                        <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                                      </label>
                                    </div>
                                </td>
                                <td>{{ $todo->todos }}</td> 
                                <td class="td-actions text-right">
                                <a href="{{route('todos.delete',['id' => $todo->id])}}" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm"><i class="material-icons">close</i></a>
                                </td>
                                </tr>
                            @endforeach
                          @else
                              <tr>
                                <td class="text-center">
                                  No completed task.
                                </td>
                              </tr>
                          @endif
                        </tbody>
                      </table>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            @if(Auth::user()->admin)
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Users Stats</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning text-center">
                      <th>Image</th>
                      <th>Name</th>
                      <th>Number of Post</th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                          <tr class="text-center">
                              <td>
                              <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="60px" height="60px" style="border-radius: 50%">
                              </td>
                              <td>
                                  {{$user->name}}
                              </td>
                              <td>
                                  {{$user->post->count()}}
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
            
            
       
@endsection
