<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-theme="light">
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

          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
        
          <!-- Vendor CSS Files -->
          <link href="{{ asset('vendor/bootstrap-5.0.0/css/bootstrap.min.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
 
          <!-- Template Main CSS File -->
          <link href="{{ asset('css/theme.css') }}" rel="stylesheet">          
          <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
          <!-- Page styles -->
          @yield('styles')

          <!-- =======================================================
          * Template Name: FlexStart - v1.0.0
          * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
          * Author: BootstrapMade.com
          * License: https://bootstrapmade.com/license/
          ======================================================== -->
          @livewireStyles
    </head>
    <body>
        @include('layouts.header')
        @yield('wideTopContent')

        <div class="pt-16 container-lg">
            @yield('content')
        </div>
        
        @yield('wideBottomContent')        
        @include('layouts.footer')
        
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        
        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-5.0.0/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
        
        @livewireScripts

        <!-- Template Main JS File -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js')}}"></script> 
        
        <!-- Page scripts -->
        @yield('scripts')
    </body>
</html>
