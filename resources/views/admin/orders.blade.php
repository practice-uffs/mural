@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Solicitações de clientes</h2>
            <p>Gerenciamento de pedidos</p>
        </header>

        @livewire('admin.orders')
    </div>
</section>
@endsection