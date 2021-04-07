<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
    @yield('styles')

    </head>

<body class="">
  <div class="wrapper ">
      @yield('content')
</div>
</div>
@include('includes.adminjs')
@yield('scripts')
</body>
@jquery
@toastr_js
@toastr_render
</html>
