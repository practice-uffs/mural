@extends('layouts.base')
@section('content')
    <section id="hero" class="hero hero-slim d-flex align-items-center h-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('img/undraw.co/fitting_pieces.svg') }}" class="w-75 h-auto mx-auto img-fluid"
                        alt="">
                </div>
                <div class="col-lg-8 d-flex flex-column justify-content-center my-3">
                    <h1 data-aos="fade-up">Categorias</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Gerenciamento de categorias utilizados para agrupar
                        serviços.</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <header class="section-header">
                <h2>Criar uma nova categoria</h2>
            </header>

            <div class="row">
                <div class="col-12">
                    @livewire('crud.main', [
                        'model' => 'App\Models\Category',
                    ])
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        section#hero {
            min-height: 50vh;
            padding: 0 0 0 0;
            margin-bottom: 50px
        }

    </style>
@endsection
