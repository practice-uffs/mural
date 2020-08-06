@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

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
                            <a href="{{ route('items.create', 1) }}"
                                class="text-secondary"
                            >
                                Adicionar Feedback
                            </a>
                            <a href="{{ route('items.create', 2) }}"
                                class="text-secondary"
                            >
                                Solicitar Serviço
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <h4>Lista de ideias criadas</h4>

        <div class="row">
            @foreach ($items as $item)
                <div class="col s12 m6 xl4">
                    <a href="{{ route('items.show', $item -> id) }}"
                        class="grey-text text-darken-4"
                    >
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">
                                    {{ $item -> title }}
                                </span>
                                <p class="truncate grey-text text-darken-3">
                                    {{ $item -> description }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        @if(Auth::check())
            <div class="fixed-action-btn fixed-action-btn--width">
                <a class="btn-floating btn-large btn--primary modal-trigger"
                    data-position="left" href="#service-form"
                    data-tooltip=" 
                        Criar um novo
                        @if($current_item_type == Item::TYPE_SERVICE)
                            Serviço
                        @else
                            Feedback
                        @endif
                    "
                >
                    <i class="large material-icons">add</i>
                </a>
            </div>

            @if($current_item_type == Item::TYPE_FEEDBACK)
            @else
                <service-form
                    url="{{ route('items.store') }}"
                    categories="{{ json_encode($categories) }}"
                    locations="{{ json_encode($locations) }}"
                >
                </service-form>
            @endif

        @endif
    </main>
@endsection
