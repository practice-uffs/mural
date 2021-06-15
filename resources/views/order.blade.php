@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Nossos valores</h2>
            <p>Pilares que norteiam nosso trabalho</p>
        </header>

        <div class="row">
            <div class="col-10 offset-1">
                @livewire('crud.main', [
                    'model' => 'App\Model\Order'
                ])
            </div>
        </div>
    </div>
@endsection