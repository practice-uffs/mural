@extends('layouts.base')
@section('content')

<section id="hero" class="hero hero-slim d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-4 hero-img">
                <img src="{{ asset('img/undraw.co/experts.svg') }}" class="w-64 h-auto" alt="">
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <h1>Usuários</h1>
                <h2>Gerenciamento de usuários que utilizam o sistema.</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @livewire('crud.main', [
                    'model' => 'App\Model\User',
                    'show_create_panel' => false
                ])
            </div>
        </div>
    </div>
@endsection