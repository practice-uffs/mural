@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Minhas solicitações</h2>
            <p>Acompanhe seus pedidos</p>
        </header>

        <div class="row">
            <div class="col-12">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Título</th>
                            <th>Situação</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>                
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="w-12 h-12 mask mask-squircle">
                                                <img src="{{ $order->service->img }}" alt="Ícone do serviço">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $order->service->name }}</div>
                                            <div class="text-sm opacity-50">{{ $order->service->category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $order->title }}
                                </td>
                                <td>
                                    <span class="badge badge-outline badge-success badge-md">{{ $order->status }}</span>
                                </td>
                                <td>
                                    <div>{{ $order->created_at }}</div>
                                    <div class="text-sm opacity-50">Última atualização: {{ $order->updated_at }}</div>
                                </td>
                                <th>
                                    <a href="{{ route('order.show', [$order->id]) }}" class="btn btn-primary">Ver detalhes</a>
                                </th>
                            </tr>
                        @empty                            
                            <p></p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection