<div id="modalFeedback" class="modal">
    <form method="post" action="{{ route('items.store') }}">
        @csrf

        <div class="modal-content">
            <h4>Adicionar uma ideia</h4>


            <input type="text" name="type" value="{{ $type }}" class="hide">

            <div class="row">
                <div class="col m6 s12">
                    <div class="input-field">
                        <label for="title">Título</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', '') }}"
                            placeholder="Ex.: Jogos digitais em aula"
                        />
                    </div>
                </div>

                <div class="col m3 s12">
                    <div class="input-field">
                        <select name="category_id" id="category_id">
                            <option value="" disabled selected>Selecione uma categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') || $category->id == $type ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label>Categoria</label>
                    </div>
                </div>

                <div class="col m3 s12">
                    <div class="input-field">
                        <select name="location_id" id="location_id">
                            <option value="" disabled selected>Selecione um local</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $location->id == old('location_id') ? 'selected="selected"' : '' }}>{{ $location->name }}</option>
                            @endforeach
                        </select>
                        <label>Local de realização</label>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m12 s12">
                    <div class="input-field">
                        <label for="description">Descrição</label>
                        <textarea
                            class="materialize-textarea"
                            id="description"
                            name="description"
                            rows="8"
                            data-length="800"
                        >{{ old('description', '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col m7 s12 text-right">
                    @if($type == Item::TYPE_SERVICE)
                        <p>
                            Esse serviço ficará visível somente a você e ao Practice.
                        </p>
                    @else
                        <div class="switch">
                            Esse item ficará visível para todos?
                            <label>
                                Não
                                <input
                                    type="checkbox"
                                    name="hidden"
                                    {{ old('hidden') == 'on' ? 'checked="checked"' : '' }}
                                >
                                <span class="lever"></span>
                                Sim
                            </label>
                        </div>
                    @endif
                </div>
        </div>

        <div class="modal-footer">
            <button
                type="submit"
                class="btn btn--primary btn--gradient modal-close"
            >
                Criar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

@extends('layouts.app')

@section('header')
<header>
    <nav class="header">
        <div class="header__wrapper">
            <a href="#" class="header__logo">
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>

            <div class="header__auth">
                @if (Auth::check())
                    <a class="nav__link dropdown-trigger"
                        data-target="userMenu"
                    >
                            <i class="material-icons">person</i>{{ $user -> uid }}
                @else
                    <a href="{{ route('login') }}"
                        class="nav__link"
                    >
                        <i class="material-icons">login</i> Entrar
                @endif
                </a>

                <ul id="userMenu" class="dropdown-content">
                    <li>
                        <a href="{{ route('logout') }}" class="text-primary">Sair</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header__nav">
            <ul>
                <li>
                    <a href="#" id="viewTrigger">
                        <span class="material-icons">
                            view_list
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
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
                            <a href="#modalFeedback"
                                class="text-secondary modal-trigger"
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

        <div class="row" id="viewList">
            @foreach ($items as $item)
                <div class="col s12 m6 xl4">
                    <a href="{{ route('items.show', $item -> id) }}"
                        class="grey-text text-darken-4"
                    >
                        <div class="card hoverable">
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
    </main>
@endsection

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let viewList = document.getElementById('viewList');
    let viewTrigger = document.getElementById('viewTrigger');

    viewTrigger.addEventListener('click', function() {
        viewList.querySelectorAll('div.col').forEach((elem) => {
            elem.classList.toggle('m6');
            elem.classList.toggle('xl4');

            if (elem.classList.contains('m6')) {
                viewTrigger.querySelector('span').innerHTML = 'view_list';

            } else {
                viewTrigger.querySelector('span').innerHTML = 'view_module';
            }
        });
    });


});
</script>
