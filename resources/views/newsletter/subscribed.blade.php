@extends('layouts.base')
@section('content')

<!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Tudo certo!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Recebemos sua inscrição em nossa newsletter.</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="{{ route('home') }}" class="btn-get-outline d-inline-flex align-items-center justify-content-center align-self-center">
                  <span><i class="bi bi-arrow-left-circle pr-2"></i>  Voltar</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('assets/img/features-3.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

@endsection