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

          <!-- Bootstrap 5.0 CDN-->
          <link href="{{ asset('vendor/bootstrap-5.0.0/css/bootstrap.min.css') }}" rel="stylesheet">

          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        
          <!-- Vendor CSS Files -->
          <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/tailwind/tailwind.css') }}" rel="stylesheet">
 
          <!-- Template Main CSS File -->
          <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        
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
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        
        <!-- BoOtstrap 5.0 JS CDN-->
        <script src="{{ asset('vendor/bootstrap-5.0.0/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- Template Main JS File -->
        <!-- Vue JS File -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script> 
    <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
</html>
