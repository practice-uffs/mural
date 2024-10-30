@extends('layouts.base')
@section('content')
    <section id="hero" class="hero hero-slim d-flex align-items-center h-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Serviço desativado</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">As solicitações de serviços estão atualmente desativados.</h2>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Comentário do conteúdo existente -->
{{--
    @extends('layouts.base')
@section('content')

    <section id="hero" class="hero hero-slim d-flex align-items-center h-auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('img/undraw.co/select_option.svg') }}" class="w-75 h-auto mx-auto img-fluid" alt="">
                </div>
                <div class="col-lg-8 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Serviços disponíveis</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Temos uma carga variada de serviços. O que podemos fazer por
                        você?</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="container" x-data="{ active: 'all' }">
        <ul class="nav justify-content-center">
            <li class="nav-item d-flex">
                <a href="javascript:void(0)" class="font-semibold nav-link"
                    :class="{ 'btn btn-primary btn-outline rounded-full': active === 'all' }"
                    @click.prevent="active = 'all'">Todos</a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="font-semibold nav-link"
                    :class="{ 'btn btn-primary btn-outline rounded-full': active === 'popular' }"
                    @click.prevent="active = 'popular'">
                    Populares
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 text-purple-700 animate-pulse inline-block"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            @foreach ($categories as $category)
                <li class="nav-item d-flex">
                    <a href="javascript:void(0)" class="font-semibold nav-link"
                        :class="{ 'btn btn-primary btn-outline rounded-full': active === '{{ $category['slug'] }}' }"
                        @click.prevent="active = '{{ $category['slug'] }}'">{{ $category['name'] }}</a>
                </li>
            @endforeach
        </ul>

        @forelse ($items as $item)
            <!-- category info -->
            <div class="row pb-4" x-show="active === 'all' || active === '{{ $item['category']['slug'] }}'">
                <div class="col-12 text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
                        <div class="flex flex-col">
                            <div class="flex flex-wrap sm:flex-row flex-col py-6">
                                <h1 id="{{ $item['category']['slug'] }}"
                                    class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">
                                    {{ $item['category']['name'] }}
                                </h1>
                                <p class="sm:w-3/5 sm:pl-10 pl-0 text-sm text-gray-400">
                                    {{ $item['category']['description'] }}
                                </p>
                            </div>
                            <div class="h-1 bg-gray-200 rounded overflow-hidden">
                                <div class="w-24 h-full bg-{{ $item['category']['color'] }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- services in category -->
            <div class="row mb-4" x-show="active === 'all' || active === '{{ $item['category']['slug'] }}'">
                <div class="col-12">
                    <div class="flex items-center justify-center">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                            @forelse ($item['services'] as $service)
                                <div class="relative bg-white py-6 px-6 rounded-3xl my-4 shadow-xl">
                                    @if (!empty($service->order) && $service->order <= 0)
                                        <span
                                            class="absolute -top-1 left-24 inline-flex items-center justify-center px-2 py-1 text-md font-bold leading-none text-purple-500 border-2 border-dotted transform rotate-3 border-purple-500 rounded hover:bg-purple-100"
                                            title="Recebemos bastante solicitações desse tipo de serviço.">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 mr-1 text-purple-700 animate-pulse" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            POPULAR
                                        </span>
                                    @endif
                                    <div
                                        class=" text-white flex items-center absolute rounded-full py-1 px-1 shadow-xl bg-{{ $service->color }} left-4 -top-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 p-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            {!! $service->icon_svg_path !!}
                                        </svg>
                                    </div>
                                    <div class="pt-12 h-100 d-flex flex-column justify-content-between">
                                        <div>

                                            <p class="text-xl font-semibold my-2">{{ $service->name }}</p>
                                            <div class="flex space-x-2 text-gray-400 text-xs my-2">
                                                <!-- svg  -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                                <p>Avaliação: {{ $service->eval_days }} dias úteis</p>
                                            </div>
                                            <div class="flex space-x-2 text-gray-400 text-xs my-2">
                                                <!-- svg  -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p>Execução: {{ $service->work_days }} dias úteis (após aprovação).</p>
                                            </div>

                                            <div class="border-t-2"></div>

                                            <div class="flex justify-between description">
                                                <div class="my-4 text-base">
                                                    <p>{!! Str::markdown($service->description ? $service->description : '') !!}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="flex justify-between">
                                                @if ($service->is_available)
                                                    <a href="{{ route('order.create', [$service->id]) }}"
                                                        class="btn btn-primary my-2">Solicitar</a>
                                                @else
                                                    <div class="alert alert-notice">
                                                        <div class="flex-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-3"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            <label class="text-sm">Esse serviço está temporariamente
                                                                indisponível. Nossas desculpas!</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            @if ($service->notice)
                                                <div class="alert alert-info">
                                                    <div class="flex-1">
                                                        <label class="text-xs">{{ $service->notice }}</label>
                                                    </div>
                                                </div>
                                            @endif
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

@section('styles')
    <style>
        section#hero {
            min-height: 50vh;
            padding: 0 0 0 0;
            margin-bottom: 50px
        }

        .description {
            min-height: 40%;
        }

    </style>
@endsection
--}}
