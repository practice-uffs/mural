@extends('layouts.app')

@section('content')

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

                    <form method="post" action="{{ route('items.update', $item) }}">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col m6 s12">
                                <div class="input-field">
                                    <label for="title">Título</label>
                                    <input
                                        type="text"
                                        class="@error('title') is-invalid @enderror"
                                        name="title"
                                        value="{{ $item -> title }}"
                                        placeholder="Ex.: Jogos digitais em aula"
                                    />
                                </div>
                            </div>

                            <div class="col m3 s12">
                                <div class="input-field">
                                    <select name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category -> id }}" {{ $category -> id == $item -> category_id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>Categoria</label>
                                </div>
                            </div>

                            <div class="col m3 s12">
                                <div class="input-field">
                                    <select name="location_id" id="location_id">
                                        @foreach ($locations as $location)
                                            <option value="{{ $location -> id }}" {{ $location -> id == $item -> location_id ? 'selected="selected"' : '' }}>{{ $location->name }}</option>
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
                                    >{{ $item -> description }}</textarea>
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
                                            {{ $item -> hidden ? 'checked="checked"' : '' }}
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
                                    Salvar
                                    <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="banner">
    <img src="{{ asset('img/banner-practice.png') }}"
        alt="practice-banner" class="banner__img"
    >
</div>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h4 class="white-text">Web Feedback</h4>
                <p class="grey-text text-lighten-4">
                    Web Feedback é um projeto que objetiva estreitar a comunicação
                    entre a comunidade UFFS e o programa Practice. Com ele é possível
                    que você publique seus comentários, sugestões e ideias voltadas para
                    a melhoria do ensino e da educação para que assim o Practice tenha
                    facilidade no planejamento e execução de seus projetos.
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Saiba mais</h5>
                <ul>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/sobre/" target="blank">
                            Sobre
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/equipe/" target="blank">
                            Quem somos
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/parcerias" target="blank">
                            Parcerias
                        </a>
                    </li>
                    <li>
                        <a class="grey-text text-lighten-3" href="https://github.com/practice-uffs" target="blank">
                            Github
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <p class="grey-text text-lighten-4 left">
                © 2020 All rights reserved.
            </p>
            <p class="grey-text text-lighten-4 right">
                Powered by
                <a class="grey-text text-lighten-4" href="htpps://materializecss.com">
                MaterializeCSS
            </a>
            </p>
        </div>
    </div>
</footer>
@endsection
