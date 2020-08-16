@extends('layouts.app')

@section('header')
<header>
    <nav class="header">
        <div class="header__wrapper">
            <a href="{{ route('items.index') }}"
                class="header__logo"
            >
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

        <h4>Lista de ideias criadas</h4>

        <div class="row" id="viewList">
            @foreach ($items as $item)
                <div class="col s12 m6 xl4">
                    <a href="{{ route('items.show', $item -> id) }}"
                        class="grey-text text-darken-4"
                    >
                        <div class="card hoverable">
                            <div class="card-content">
                                <span class="card-title truncate">
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
    @if (Auth::check())
        <feedback-form
            modal-id="modalFeedback"
            user-id="{{ $user -> id }}"
        ></feedback-form>

        <service-form
            modal-id="modalService"
        />
    @endif

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
