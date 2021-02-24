<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf-token" content="{{ csrf_token()}}">
          <script>window.Laravel = {csrfToken:'{{ csrf_token() }}'}</script>
          <title>Mural - PRACTICE</title>
        
          <meta content="" name="description">
          <meta content="" name="keywords">
        
          <!-- Favicons -->
          <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

          <!-- material icons-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
          <!-- bootstrapicon -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

          <!-- Bootstrap 5.0 CDN-->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        

          <!-- Template Main CSS File -->
          <link href="{{ asset('css/style.css') }}" rel="stylesheet">
          <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    </head>
    <body >
        <div id="app">
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
    <script src="{{ asset('js/login.js') }}"></script>
</html>
