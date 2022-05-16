@extends('layouts.base')
@section('content')
    <section id="hero" class="hero hero-slim d-flex align-items-center h-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 hero-img">
                    <img src="{{ asset('img/undraw.co/destinations.svg') }}" class="w-75 h-auto mx-auto img-fluid" alt="">
                </div>
                <div class="col-lg-8 d-flex flex-column justify-content-center my-3">
                    <h1>Locais</h1>
                    <h2>Gerenciamento de locais mostrados nas solicitações de
                        serviço.</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <header class="section-header">
                <h2>Criar um novo local</h2>
            </header>

            <div class="row">
                <div class="col-12">
                    @livewire('crud.main', [
                        'model' => 'App\Models\Location',
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
