@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Solicitacão</h2>
            <p>Informações de solicitação</p>
        </header>

        <div class="row">
            <div class="col-lg-9 order-2 order-md-1 col-md-8">
                @livewire('order.show', ['order' => $order])
                @livewire('comments', ['commentable' => $order])
            </div>
            <div class="col-lg-3 order-1 order-md-2 col-md-4">
                @livewire('order.status', ['order' => $order])
            </div>
        </div>
    </div>
@endsection