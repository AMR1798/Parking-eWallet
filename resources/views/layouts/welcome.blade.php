<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/fullpage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fullpage.css') }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcomedesign.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        .fp-controlArrow.fp-prev {
    left: 0;
    border: none;
    width: 50px;
    height: 101px;
    background: url(/img/back.svg) no-repeat;
    cursor: pointer;
}
.fp-controlArrow.fp-next {
    right: 0;
    border: none;
    width: 50px;
    height: 101px;
    background: url(/img/next.svg) no-repeat;
    cursor: pointer;
}
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar text-center fixed-top navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo.png" style="max-height:45px" class="d-inline-block align-top" alt="">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link" href="{{ route('login') }}">
                                <button type="button" class="btn btn-link navbarlinkstyle"
                                    style="color:white">{{ __('Login') }}</button>

                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}">
                                <button type="button" class="btn btn-rounded btn-light">{{ __('Register') }}</button>
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <button type="button" class="btn btn-primary btn-rounded dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-center text-center">
                                @if (Auth::user()->isAdmin == 0)
                                <a class="dropdown-item" href="/home"> Home </a>
                                @endif
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
            </div>
    </div>
    </nav>

    <main>
        @yield('content')
    </main>
    </div>
</body>

</html>
