{{-- @extends('layouts.app')

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
    </nav>
</header>
@endsection

@section('content')
<main class="container">
    <div class="row">
        <div class="col l12">
            <div class="card">
                <div class="card-content">

                    <div class="card-title">
                        {{ $formTitle }}
                    </div>

                    <form method="post" action="{{ route('items.store') }}">
                        @csrf

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
                                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
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

                            <div class="col m5 s12 right-align">
                                <button
                                    type="submit"
                                    class="btn btn--primary btn--gradient"
                                >
                                    Criar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col m12">
                                <div class="card-panel red darken-2 white-text">
                                    <div class="card-title">
                                        <div class="valign-wrapper">
                                            <i class="material-icons">error_outline</i>Atenção
                                        </div>
                                    </div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection --}}
