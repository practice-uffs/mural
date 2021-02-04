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

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo-practice.png') }}" alt="">
        <span>Mural</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active " href="{{ route('index') }}">Inicial</a></li>
          <li><a class="nav-link scrollto" href="{{ route('feedbacks') }}">Ideias</a></li>
          <li><a class="nav-link scrollto" href="{{ route('services') }}">Acompanhar serviços</a></li>
          <li><a class="nav-link scrollto" href="{{ route('services') }}">Solicitar serviço</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Central de Serviços e Ideias</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Uma ponte entre você e a construção de uma universidade melhor</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Solicitar serviço</span>
                  <i class="bi bi-arrow-right-circle"></i>
              </a>
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Ideias</span>
                  <i class="bi bi-lightbulb"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos-delay="200">
            <div class="content">
              <h3>Boas-vindas!</h3>
              <h2>Central de solicitação de serviços do PRACTICE e um local de discussão de ideias</h2>
              <p>
                Essa é a plataforma oficial do programa onde a comunidade acadêmica pode solicitar e acompanhar serviços. Além disso, você pode dar sugestões de melhorias e ideias, fazendo parte do crescimento do programa e inovação da <a href="https://www.uffs.edu.br/"><strong>UFFS</strong></a>.
              </p>
              <div class="text-center text-lg-start">
                <a href="https://practice.uffs.cc" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Conheça o PRACTICE</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('img/hero/estudio-practice.jpg') }}" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container">

        <header class="section-header">
          <h2>Nossos valores</h2>
          <p>Pilares que nos norteiam</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos-delay="200">
              <img src="{{ asset('assets/img/values-1.png') }}" class="img-fluid" alt="">
              <h3>Tecnologia</h3>
              <p>Buscamos criar soluções tecnológicas para aprimorar o ambiente acadêmico de ensino e aprendizagem.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos-delay="400">
              <img src="{{ asset('assets/img/values-2.png') }}" class="img-fluid" alt="">
              <h3>Comunidade</h3>
              <p>Não estamos sós, focamos na habilidade pedagógica e tecnológica tanto de servidores quanto estudantes.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos-delay="600">
              <img src="{{ asset('assets/img/values-3.png') }}" class="img-fluid" alt="">
              <h3>Independência</h3>
              <p>Nossa missão é empoderar tecnologicamente pessoas para que a tecnologia seja ajuda, não barreira.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Algumas de nossas estatísticas</h2>
        </header>

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-headset" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container">

        <header class="section-header">
          <h2>Serviços</h2>
          <p>Como podemos ajudar</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-discuss-line icon"></i>
              <h3>Nesciunt Mete</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Eosle Commodi</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Ledo Markt</h3>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos-delay="500">
            <div class="service-box red">
              <i class="ri-discuss-line icon"></i>
              <h3>Asperiores Commodi</h3>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos-delay="600">
            <div class="service-box purple">
              <i class="ri-discuss-line icon"></i>
              <h3>Velit Doloremque.</h3>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos-delay="700">
            <div class="service-box pink">
              <i class="ri-discuss-line icon"></i>
              <h3>Dolori Architecto</h3>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container">

        <header class="section-header">
          <h2>Testemunhos</h2>
          <p>O que dizem sobre nós e nosso trabalho</p>
        </header>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
                <div class="profile mt-auto">
                  <img src="{{ asset('assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Nossa Newsletter</h4>
            <p>Fique por dentro de todas as novidades do programa e dos projetos que estamos trabalhando</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

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
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>