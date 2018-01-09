<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hector Platform - Uniwersalna platforma modyfikacji</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Hector Platform<sup style="font-size: 10px">v1.1.2</sup>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{{ (Request::is('/') ? 'active' : '') }}}">
                            <a class="nav-link" href="/"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Aktualności <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{{ (Request::is('launcher') ? 'active' : '') }}}">
                            <a class="nav-link" href="https://wiki.hectorwilde.com/wiki/Hector_Platform#Pobieranie_launchera"><i class="fa fa-download" aria-hidden="true"></i> Launcher <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{{ (Request::is('modpacks') ? 'active' : '') }}}">
                            <a class="nav-link" href="{{ route('modpacks') }}"><i class="fa fa-inbox" aria-hidden="true"></i> Paczki Modyfikacji <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-star" aria-hidden="true"></i> Hector Universe <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
								<li><a class="nav-link" href="https://hectorwilde.com/"><i class="fa fa-home" aria-hidden="true"></i> Strona główna <span class="sr-only">(current)</span></a></li>
								<li><a class="nav-link" href="https://forum.hectorwilde.com/"><i class="fa fa-comments" aria-hidden="true"></i> Społeczność <span class="sr-only">(current)</span></a></li>
								<li><a class="nav-link" href="https://github.com/hector-freedom/"><i class="fa fa-github" aria-hidden="true"></i> GitHub <span class="sr-only">(current)</span></a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Logowanie</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-pencil" aria-hidden="true"></i> Rejestracja</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-address-card" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    @if(Auth::user()->isAdmin == 1)
                                    <li><a href="{{ route('admin') }}">Panel Administracyjny</a></li>
                                    @endif
                                    <li><a href="{{ route('settings') }}">Ustawienia konta</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Wyloguj
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {!! NoCaptcha::renderJs() !!}
</body>
</html>
