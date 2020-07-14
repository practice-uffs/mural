<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Web Feedback {{ isset($view_name) ? '· ' . $view_name : '' }} </title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
