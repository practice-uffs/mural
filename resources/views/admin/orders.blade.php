@extends('layouts.base')
@section('content')

<section>
    <div class="container mt-10">
        <header class="section-header mt-10">
            <h2>Solicitações de clientes</h2>
            <p>Gerenciamento de pedidos</p>
        </header>

        @livewire('admin.orders')
    </div>
</section>
@endsection