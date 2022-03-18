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
                <table class="d-flex flex-column">
                    <thead class="d-flex flex-row w-auto">
                        <tr class="row w-100">
                            <th class="order-2 order-lg-1 col-12 col-lg-2 col-md-4">Tipo</th>
                            <th class="order-3 order-lg-2 col-12 col-lg-4 col-md-8">Título</th>
                            <th class="order-1 order-lg-3 col-12 col-lg-2">Situação</th>
                            <th class="order-4 order-md-4 col-6 col-lg-3 col-md-8">Data</th>
                            <th></th>
                        </tr>
                    </thead>                
                    <tbody class="d-flex flex-column">
                        @foreach ($orders as $order)
                            <tr class="row py-3 border-bottom">
                                <td class="order-2 order-lg-1 col-12 col-lg-2 col-md-4">
                                    <div class="d-flex flex-sm-column">
                                        <div class="avatar pr-3">
                                            <div class="w-10 h-10 mask mask-circle bg-{{ @$order->service->category->color }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mt-1 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    {!! @$order->service->icon_svg_path !!}
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ @$order->service->name }}</div>
                                            <div class="text-sm opacity-50">{{ @$order->service->category->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="order-3 order-lg-2 pb-3 col-12 col-lg-4 col-md-8 text-wrap d-md-flex align-items-md-end align-items-lg-center ">
                                    {{ $order->title }}
                                </td>
                                <td class="order-1 order-lg-3 col-12 col-lg-2 d-flex justify-content-end justify-content-lg-start pb-1 pl-0 align-items-center">
                                    <span class="badge badge-outline badge-info badge-md">{{ $order->situation()->text }}</span>
                                </td>
                                <td class="order-4 order-md-4 col-6 col-lg-3 col-md-8 pt-2  d-lg-flex align-items-lg-start justify-content-lg-center flex-lg-column">
                                    <div>{{ $order->created_at }}</div>
                                    <div class="text-sm opacity-50">Última atualização: {{ $order->updated_at }}</div>
                                </td>
                                <td class="order-5 order-md-5 col-6 col-lg-1 col-md-4 pt-2 d-flex justify-content-end justify-content-lg-start align-items-end  align-items-lg-start d-lg-flex align-items-lg-center">
                                    <a href="{{ route('order.show', [$order->id]) }}" class="btn btn-primary">Detalhes</a>
                                </td>
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
                                <p class="leading-relaxed text-base">Temos uma equipe multidisciplinar muito disposta a ajudar! Dê uma olhada nos <a href="{{ route('services') }}">serviços disponíveis</a> e conheça mais sobre como podemos auxiliar.</p>
                                <p class="mt-4"><a href="{{ route('services') }}" class="btn btn-primary">Ver serviços</a></p>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    @endif
</div>
@endsection