@extends('layouts.base')
@section('content')

<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('assets/img/features-3.png') }}" class="w-96 h-auto" alt="">
            </div>
            <div class="col-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Oi, tudo bem?</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Que bom ver você por aqui novamente ❤️</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <header class="section-header">
            <h2>Nossos valores</h2>
            <p>Pilares que norteiam nosso trabalho</p>
        </header>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('crud.main', [
                    'model' => 'App\Model\Order'
                ])
            </div>
        </div>
    </div>
@endsection