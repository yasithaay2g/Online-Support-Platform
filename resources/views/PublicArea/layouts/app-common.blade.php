<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#2b2c5a">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#2b2c5a">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#2b2c5a">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="earth Platform">
    <meta name="description" content="A Admin Dashboard for earth Platform">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{asset('PublicArea/img/faveicon2.png')}}" rel="icon">
    <link rel="shortcut icon" href="{{asset('PublicArea/img/faveicon2.png')}}" type="image">
    <title> Home</title>
    <!-- Favicon -->
  
    @include('PublicArea/includes.css')

    @yield('css')
    @php
    $curr_url = Route::currentRouteName();
    @endphp
    
</head>

<body>

    <!-- Sidenav -->
 
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('PublicArea/includes.nav')
        <!-- Header -->
        @yield('header')
        <!-- Header -->
        <div class="container-fluid mt--6">
            <!-- Page content -->
            @yield('content')

        </div>
    </div>
    <!-- Argon Scripts -->
  
        @include('PublicArea/includes.js')
        @yield('js')

</body>

</html>
