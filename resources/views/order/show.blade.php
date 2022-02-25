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
                @livewire('order.show', ['order' => $order])
                @livewire('comments', ['commentable' => $order])
            </div>
            <div class="col-3">
                @livewire('order.status', ['order' => $order])
            </div>
        </div>
    </div>
@endsection