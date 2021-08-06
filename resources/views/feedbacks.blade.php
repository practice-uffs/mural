@extends('layouts.base')
@section('content')

<section id="hero" class="hero hero-slim d-flex align-items-center mt-10 mb-10">
    <div class="container">
        <div class="row">
            <div class="col-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('img/undraw.co/feedback.svg') }}" class="w-96 h-auto mx-auto" alt="">
            </div>
            <div class="col-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Queremos seu feedback</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Sua opinição é vital para nossa evolução. Faça críticas, elogios e sugestões sobre nosso trabalho.</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <header class="section-header">
            <h2>Queremos melhorar</h2>
            <p>O que você tem a nos dizer?</p>
        </header>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('crud.main', [
                    'model' => 'App\Model\Feedback',
                    'show_list' => false,
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div>
    </div>
@endsection