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
        @if (Auth::check())
            <div class="header__nav">
                <ul>
                    <li>
                        <a href="#">Criar Item</a>
                    </li>
                </ul>
            </div>
        @endif  
    </nav>
</header>
@endsection

@section('content')
    <main class="container">
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
    </main>
@endsection
