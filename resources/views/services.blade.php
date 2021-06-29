@extends('layouts.base')
@section('content')

<section>
    <div class="container">
        <header class="section-header">
            <h2>Serviços disponíveis</h2>
            <p>O que podemos fazer por você?</p>
        </header>

        @forelse ($items as $item)
        <!-- category info -->
        <div class="row pb-4">
            <div class="col-12 text-gray-600 body-font">
                <div class="container px-5 py-4 mx-auto">
                    <div class="flex flex-col">
                        <div class="flex flex-wrap sm:flex-row flex-col py-6">
                            <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">
                                {{ $item['category']['name'] }}
                            </h1>
                            <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">
                                {{ $item['category']['description'] }}
                            </p>
                        </div>
                        <div class="h-1 bg-gray-200 rounded overflow-hidden">
                            <div class="w-24 h-full bg-indigo-500"></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

        <!-- services in category -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="flex items-center justify-center">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                        @forelse ($item['services'] as $service)
                        <div class="relative bg-white py-6 px-6 rounded-3xl w-96 my-4 shadow-xl">
                            <div class=" text-white flex items-center absolute rounded-full py-1 px-1 shadow-xl bg-pink-500 left-4 -top-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z" />
                                </svg>
                            </div>
                            <div class="mt-12">
                                <p class="text-xl font-semibold my-2">{{ $service->name }}</p>
                                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                                    <!-- svg  -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p>{{ $service->work_days }} dias úteis (após aprovação)</p>
                                </div>
                                <div class="border-t-2"></div>

                                <div class="flex justify-between">
                                    <div class="my-2 h-40">
                                        <p>{{ $service->description }}</p>
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <a href="{{ route('order.create', [$service->id]) }}" class="btn btn-primary my-2">Solicitar</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        Nenhum serviço
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @empty
        Nenhuma categoria
        @endforelse
    </div>
    @endsection