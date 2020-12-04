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
    <title> Admin </title>
    <!-- Favicon -->
  
    @include('AdminArea/includes.css')

    @yield('css')
    @php
    $curr_url = Route::currentRouteName();
    @endphp
    
</head>

<body>

    <!-- Sidenav -->
    @include('AdminArea/includes.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('AdminArea/includes.nav')
        <!-- Header -->
        @yield('header')
        <!-- Header -->
        <div class="container-fluid mt--6">
            <!-- Page content -->
            @yield('content')

        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <div class="modal fade ml-6" id="logoutModal" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true" style="margin-left: 25px;">
        <div class="modal-dialog modal-primary modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-primary modal-sm ">

                <div class="modal-header">
                    <h6 class="modal-title " id="modal-title-notification">Logout</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="py-3 text-center">

                        <h4 class="heading mt-4">Are You Sure!</h4>
                        <p>
                            Do You Want To Logout Now ?
                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="Submit" class="btn btn-white">Sure, Logout</button>
                        <button type="button" class="btn btn-link text-white ml-auto"
                            data-dismiss="modal">Close</button>
                    </form>
                </div>

            </div>
        </div>
        @include('AdminArea/includes.js')
        @yield('js')

</body>

</html>
