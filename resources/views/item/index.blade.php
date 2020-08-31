@extends('layouts.app')

@include('layouts.header', ['home' => true])

@section('content')

    <main class="container">
        @if (Auth::check())
            <div class="row">
                <div class="col s12">
                    <div class="card card--primary card--gradient white-text">
                        <div class="card-content">
                            <div class="card-title">
                                Possui alguma ideia ou deseja um serviço em especial?
                            </div>
                            Você pode facilmente reportar ideias, sugestões e reclamações. Serviços mais específicos também podem ser requisitados.
                        </div>

                        <div class="card-action">
                            <a href="#modalFeedback"
                                class="text-secondary modal-trigger"
                            >
                                Adicionar Feedback
                            </a>
                            <a href="#modalService"
                                class="text-secondary modal-trigger"
                            >
                                Solicitar Serviço
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <item-list item-type=1></item-list>
        <item-list item-type=2></item-list>

        {{-- <div id="services">
            <h4>Lista de Serviços criados</h4>

            <div class="row" data-toggle="toggle-list">
                @foreach ($services as $service)
                    <div class="col s12 m6 xl4">
                        <a href="{{ route('items.show', $service -> id) }}"
                            class="grey-text text-darken-4"
                        >
                            <div class="card hoverable">
                                <div class="card-content">
                                    <span class="card-title truncate">
                                        {{ $service -> title }}
                                    </span>
                                    <p class="truncate grey-text text-darken-3">
                                        {{ $service -> description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div> --}}
        
    </main>
    @if (Auth::check())
        <feedback-form
            modal-id="modalFeedback"
            user-id="{{ $user -> id }}"
        ></feedback-form>

        <service-form
            modal-id="modalService"
            user-id="{{ $user -> id }}"
        ></service-form>
    @endif

@endsection

