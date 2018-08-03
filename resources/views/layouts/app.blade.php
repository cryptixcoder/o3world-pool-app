<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
      <title>O3 World - Home</title>
      <path fill="currentColor" fill-rule="evenodd" d="M90,90H40V40H90V90ZM77.029,65A12.027,12.027,0,1,0,65,77.027,12.04,12.04,0,0,0,77.029,65Zm-4.841,0A7.185,7.185,0,1,1,65,57.816,7.194,7.194,0,0,1,72.187,65ZM83.32,80.665a2.089,2.089,0,0,0-1.132-1.994,1.87,1.87,0,0,0,1.009-1.8,2.682,2.682,0,0,0-5.352-.013h1.6a1.077,1.077,0,1,1,2.154.062,1,1,0,0,1-1.108,1.095H80.257V79.41H80.49a1.212,1.212,0,0,1,.049,2.423,1.107,1.107,0,0,1-1.193-1.145h-1.6A2.793,2.793,0,0,0,83.32,80.665Z" transform="translate(-40 -40)"></path>
    </svg>
                   
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('game.index') }}">Games</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('player.index') }}">Players</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('javascript')
</body>
</html>
