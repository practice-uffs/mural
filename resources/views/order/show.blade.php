@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Solicitacão</h2>
            <p>Informações de solicitação</p>
        </header>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('order.show', [
                    'model' => 'App\Model\Order',
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('comments', [
                    'model' => 'App\Model\Order',
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div>
    </div>
@endsection