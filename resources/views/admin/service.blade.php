@extends('layouts.base')
@section('content')

<section id="hero" class="hero hero-slim d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-4 hero-img">
                <img src="{{ asset('img/undraw.co/online_groceries.svg') }}" class="w-64 h-auto" alt="">
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <h1>Serviços</h1>
                <h2>Gerenciamento dos serviços disponíveis para solicitação dos clientes.</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <header class="section-header">
            <h2>Criar um novo serviço</h2>
        </header>

        <div class="row">
            <div class="col-12">
                @livewire('admin.service', [
                    'model' => 'App\Model\Service'
                ])
            </div>
        </div>
    </div>
@endsection