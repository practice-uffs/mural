@extends('layouts.base')
@section('content')

<section id="hero" class="hero hero-slim d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-4 hero-img">
                <img src="{{ asset('img/undraw.co/push_notifications.svg') }}" class="w-64 h-auto mx-auto" alt="">
            </div>
            <div class="col-8 d-flex flex-column justify-content-center">
                <h1>Minhas solicitações</h1>
                <h2>Acompanhe seus pedidos.</h2>
            </div>
        </div>
    </div>
</section>

<div class="container">
    @if (count($orders) > 0)
        <header class="section-header">
            <h2>Lista de pedidos</h2>
        </header>

        <div class="row">
            <div class="col-12">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Título</th>
                            <th>Situação</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>                
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="w-10 h-10 mask mask-circle bg-{{ @$order->service->category->color }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mt-1 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    {!! $order->service->icon_svg_path !!}
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $order->service->name }}</div>
                                            <div class="text-sm opacity-50">{{ @$order->service->category->name }}</div>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <section class="text-gray-600">
                    <div class="px-5 py-14 mx-auto">
                        <div class="flex items-center lg:w-3/5 mx-auto pb-10 mb-10 sm:flex-row flex-col">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full text-indigo-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-grow sm:text-left mt-6 sm:mt-0">
                                <h2 class="text-gray-900 text-lg title-font font-semibold mb-2">Você não fez pedidos ainda</h2>
                                <p class="leading-relaxed text-base">Temos uma equipe multidisciplinar muito disposta a ajudar! Dê uma olhada nos <a href="{{ route('services') }}">serviços disponíveis</a> e conheça mais como poder auxiliar.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
</div>
@endsection