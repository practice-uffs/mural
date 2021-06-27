@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Solicitação de serviço</h2>
            <p>Tipo do serviço aqui</p>
        </header>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('order.create', [
                    'model' => 'App\Model\Order',
                    'include_create' => [
                        'user_id' => auth()->id(),
                        'service_id' => $service->id
                    ]
                ])
            </div>
        </div>
    </div>
@endsection