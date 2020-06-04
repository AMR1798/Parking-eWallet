<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/fullpage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/6c0f156d86.js" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fullpage.css') }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">

</head>


<body class="fixed-sn white-skin">

    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav  fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="/admin"><img src="img/logo.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->

                
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i>
                                Dashboard<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="/admin" class="waves-effect">Parking Overview</a>
                                    </li>
                                    <li><a href="/admin-parking-logs" class="waves-effect">Parking Logs</a>
                                    </li>
                                    <li><a href="/admin-payment-overview" class="waves-effect">Payment Overview</a>
                                    </li>
                                    <li><a href="/admin-payment-logs" class="waves-effect">Payment Logs</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="waves-effect" href="/pricing"><i class="fas fa-cog"></i>
                                Configure Price</a>
                            
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse black-text"><i
                        class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p> Dashboard </p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <button type="button" class="btn btn-link navbarlinkstyle"
                            style="color:black"><strong>{{ __('Login') }}</strong></button>
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('register') }}">
                        <button type="button"
                            class="btn btn-rounded btn-light"><strong>{{ __('Register') }}</strong></button>
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <button type="button" class="btn cloudy-knoxville-gradient btn-rounded dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-center text-center">
                        <a class="dropdown-item" href="/home"> Home </a>
                        @if (Auth::user()->isAdmin == 1)
                            <a class="dropdown-item" href="/admin"> Admin </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>



                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

    <!--Main layout-->
    <main>

        <div class="container-fluid" style="margin-top:2%">
            @yield('content')
        </div>

    </main>
    <!--/Main layout-->

    <!--Footer-->
    

</body>


</html>

<script>
    $(document).ready(() => {
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);

        new WOW().init();
    });

</script>
