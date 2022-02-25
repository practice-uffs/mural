@extends('layouts.base')
@section('content')

<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('img/undraw.co/happy_announcement.svg') }}" class="w-96 h-auto mx-auto" alt="">
            </div>
            <div class="col-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Oi, tudo bem?</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Que bom que você está aqui novamente ❤️</h2>
            </div>
        </div>
    </div>
</section>

@endsection