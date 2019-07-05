<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" id = "csrf_token">    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/top-menu.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div>
          <nav class="tabs">
            <div class="selector"></div>
            <a href="#" class="active"><i class="fab fa-superpowers"></i>Home</a>
            <a href="#"><i class="fas fa-hand-rock">About us</i></a>
            <a href="#"><i class="fas fa-bolt"></i>page 3</a>
            <a href="#"><i class="fas fa-burn"></i>page 4</a>
          </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src = {{asset('assets/js/top-menu.js')}}></script>
    <script type="text/javascript" src = {{asset('assets/js/homePageFunctions.js')}}></script>
</body>
</html>
