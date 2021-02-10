<!DOCTYPE html>
<html lang="en">

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

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('index') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo-practice.png') }}" alt="">
        <span>Mural</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto @if (request()->routeIs('index')) active @endif" href="{{ route('index') }}">Inicial</a></li>
          <li><a class="nav-link scrollto @if (request()->routeIs('feedbacks')) active @endif" href="{{ route('feedbacks') }}">Ideias</a></li>
          <li><a class="nav-link scrollto @if (request()->routeIs('services')) active @endif" href="{{ route('services') }}">Acompanhar serviços</a></li>
          <li><a class="nav-link scrollto @if (request()->routeIs('services')) active @endif" href="{{ route('services') }}">Solicitar serviço</a></li>
          @if (Auth::check())
            <li class="dropdown mx-4">
                <a href="#">
                    <span class="px-2">{{ Auth()->user()->username }}</span>
                    <img src="{{ asset('img/avatars/avatar-' . (auth()->user()->id % 4 + 1) . '.png') }}" width="32" height="32" class="rounded-circle">
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="mx-4">
                    <li><a href="{{ route('logout') }}">Sair<i class="bi bi-box-arrow-right"></i></a></li>
                </ul>
            </li>
          @else
            <li><a class="getstarted scrollto" href="{{ route('login') }}">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{ route('index') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('img/logo-practice.png') }}" alt="">
            </a>
            <p>O Programa de Ampliação e Consolidação de Tecnologias e Inovação no Contexto Educacional (PRACTICE) objetiva estruturar ambientes e capacitar agentes educacionais para a produção e mediação de conteúdos por meio de tecnologias.</p>
            <div class="social-links mt-3">
              <a href="https://www.instagram.com/practiceuffs/" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="https://github.com/practiceuffs" class="github"><i class="bi bi-github bx bxl-github"></i></a>
              <a href="https://www.youtube.com/channel/UCu3jAl8MTMPkaxb3u0_xESw" class="youtube"><i class="bi bi-youtube"></i></a>
              <a href="https://twitter.com/PracticeUFFS" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/practiceuffs" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.linkedin.com/company/practiceuffs" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Divulgação</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-audio-e-video.pdf">Serviços de áudio</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-conteudo.pdf">Serviços de conteúdo</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-Estudio.pdf">Serviços de estúdio</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-eventos-online.pdf">Serviços de eventos online</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos.pdf">Visão geral</a></li>
            </ul>
          </div>
          
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contato</h4>
            <p>
              <strong>Email:</strong> practice@uffs.edu.br<br>
              <strong>Atuações:</strong> <br>
              Campus Erechim, Cerro Largo, Passo fundo, Chapecó, Realeza e Laranjeiras do Sul.<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>