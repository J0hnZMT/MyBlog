<!-- Sidebar -->
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('/assets/img/sidebar-1.jpg')}}">
      <div class="logo">
            @if (Route::has('login'))  
                @auth
                <a class="simple-text logo-normal" href="{{ route('index') }}">{{ $settings->site_name }}</a>
                @else
                    Home 
                @endauth
            @endif
      </div>
      
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{route('home')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(Auth::user()->admin)
          <li class="nav-item ">
            <a class="nav-link" href="{{route('users')}}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          @endif
          <li class="nav-item ">
            <a class="nav-link" href="{{route('categories')}}">
              <i class="material-icons">category</i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('tags')}}">
              <i class="material-icons">label</i>
              <p>Tags</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('posts')}}">
              <i class="material-icons">subject</i>
              <p>Posts</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('post.trash')}}">
              <i class="material-icons">delete</i>
              <p>Trashed Posts</p>
            </a>
          </li>
          @if(Auth::user()->admin)
          <li class="nav-item ">
            <a class="nav-link" href="{{route('settings')}}">
            <i class="fa fa-cog fa-2x"> </i>
              <p>Settings</p>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
    <!-- End Sidebar -->
