@extends('layouts.app')

@section('header')
<header>
    <nav class="header">
        <div class="header__wrapper">
            <a href="#" class="header__logo">
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>

            <div class="header__nav">
                <a class="nav__link dropdown-trigger"
                    data-target="userMenu"
                >
                    <i class="material-icons">person</i>{{ $user -> uid }}
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

@endsection
