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
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                {{ $item -> title }}
                @if ($item -> user_id == $user -> id)
                    <a href="{{ route('items.edit', $item) }}"
                        class="btn btn-primary right"
                    >
                        <i class="material-icons left">edit</i>
                        Editar
                    </a>
                @endif
            </div>

            <p>{{ $item -> description }}</p>

        </div>

        <div class="card__reaction">
            <reaction-list
                user-id="{{ $user -> id }}"
                item-id="{{ $item -> id }}"
            >
            </reaction-list>
        </div>
    </div>

    <div class="timeline">
        <ul class="timeline__list">
            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">
                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>

                    <div class="timeline__reactions">
                        <ul class="reaction-list">
                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">error_outline</i>
                                </div>

                                <div class="reaction__count">
                                    5
                                </div>
                            </li>

                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">add</i>
                                </div>

                                <div class="reaction__count">
                                    8
                                </div>
                            </li>

                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">phone</i>
                                </div>

                                <div class="reaction__count">
                                    2
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">

                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                </div>
            </li>

            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">

                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                </div>
            </li>

            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">

                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                </div>
            </li>
        </ul>
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
