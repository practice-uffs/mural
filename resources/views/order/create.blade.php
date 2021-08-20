@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Solicitação de serviço</h2>
            <p>{{ $service->name }}</p>
        </header>

        <div class="row mb-4">
            <div class="col-10 offset-1 text-sm text-gray-400">
                <strong>Resumo do serviço</strong>
                {!! Str::markdown($service->description ? $service->description : '') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('order.create', [
                    'model' => 'App\Model\Order',
                    'service' => $service,
                    'show_list' => false,
                    'include_create' => [
                        'user_id' => auth()->id(),
                        'service_id' => $service->id
                    ]
                ])
            </div>
        </div>
    </div>
@endsection