@extends('layouts.app')

@section('header')
<header>
    <nav class="nav-extended">
        <div class="nav-wrapper grey lighten-5">
            <a href="#" class="brand-logo">
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>
            <ul id="nav-mobile" class="right">

            </ul>
        </div>

        <div class="nav-content grey lighten-2">

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
                        Criar Novo Item
                    </div>

                    @if ($errors->any())
                        <div class="row">
                            <div class="col m12">
                                <div class="card-panel red darken-2 white-text">
                                    <div class="card-title">
                                        <div class="vertical-wrapper">
                                            <i class="material-icons">error_outline</i>
                                            Atenção
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

                    <form method="post" action="{{ route('items.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col m6 s12">
                                <div class="input-field">
                                    <label for="title">Título</label>
                                    <input
                                        type="text"
                                        class="@error('title') is-invalid @enderror"
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
                                        class="materialize-textarea @error('description') is-invalid @enderror"
                                        id="description"
                                        name="description"
                                        rows="8"
                                    >{{ old('description', '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col m6 s12 text-right">
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
                            </div>

                            <div class="col m6 s12 right-align">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Criar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
