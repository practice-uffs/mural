@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Solicitacão</h2>
            <p>Informações de solicitação</p>
        </header>

        <div class="row">
            <div class="col-9">
                @livewire('order.show', [
                    'model' => 'App\Model\Order',
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])

                @livewire('comments', [
                    'commentable' => $order,
                ])
            </div>

            <div class="col-3">
                @livewire('order.status', [
                    'model' => 'App\Model\Order',
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div>
    </div>
@endsection