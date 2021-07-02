@extends('layouts.base')
@section('content')

<section id="hero" class="hero hero-slim d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-4 hero-img">
                <img src="{{ asset('img/undraw.co/fitting_pieces.svg') }}" class="w-64 h-auto" alt="">
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <h1>Categorias</h1>
                <h2>Gerenciamento de categorias utilizados para agrupar serviços.</h2>
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
                    'model' => 'App\Model\Category'
                ])
            </div>
        </div>
    </div>
@endsection