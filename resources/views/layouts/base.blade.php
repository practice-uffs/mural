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
          <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
          <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

          <!-- material icons-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

          <!-- boortstrap -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
               
          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        
          <!-- Vendor CSS Files -->
          <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
          <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

 
          <!-- Template Main CSS File -->
          <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        
          <!-- =======================================================
          * Template Name: FlexStart - v1.0.0
          * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
          * Author: BootstrapMade.com
          * License: https://bootstrapmade.com/license/
          ======================================================== -->
    </head>
    <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="100">
        
        @include('layouts.header')
        
        <div id="app">
            @yield('content')
        </div>
        
        @include('layouts.footer')
        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        
        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
        <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


         <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script> 
        
        <!-- Vue JS File -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
