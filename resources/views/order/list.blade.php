@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Suas solicitações</h2>
            <p>Acompanhe seus pedidos</p>
        </header>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('crud.main', [
                    'model' => 'App\Model\Order',
                    'include_create' => [
                        'user_id' => auth()->id()
                    ]
                ])
            </div>
        </div>
    </div>
@endsection