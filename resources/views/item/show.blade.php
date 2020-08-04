@extends('layouts.app')

@section('content')

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

<main class="container">
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                {{ $item -> title }}
                @if ($item -> user_id == $user -> id)
                    <a href="{{ route('items.edit', $item) }}"
                        class="btn btn--primary btn--gradient right"
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

    <comment-list
        user-id="{{ $user -> id }}"
        item-id="{{ $item -> id }}"
    ></comment-list>
</main>
@endsection
