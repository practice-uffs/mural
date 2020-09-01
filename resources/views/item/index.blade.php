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

            @include('layouts.headerAuth')
        </div>

        <div class="header__nav hide-on-small-only">
            <ul>
                <li>
                    <a href="javascript:void(0)" id="viewTrigger">
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
            @foreach ($items as $key => $item)
                <div class="col s12 m6 xl4">
                    <a href="{{ route('items.show', $item -> id) }}"
                        class="grey-text text-darken-4"
                    >
                        <div class="card hoverable">
                            <div class="card-content">
                                <span class="card-title truncate">
                                    {{ $item -> title }}
                                </span>
                                <p class="grey-text text-darken-3 truncate">
                                    {{ $item -> description }}
                                </p>
                                <div class="user-info pt-3 pl-3">
                                    <img src="{{asset('img/avatars/avatar-' . ($user->id % 4 + 1) . '.png') }}" height="45" class="user-info__avatar" alt="Avatar">
                                    <div class="user-info__uid-name px-2">
                                        <div>
                                            {{ $user->name }}
                                        </div>
                                        <div class="pl-2">
                                            {{ $user->uid }}
                                        </div>
                                    </div>
                                </div>
                                @if($item->hasReactions())
                                    <ul class="reaction-list pt-4 pl-3"> 
                                        @foreach ($item->getReactionsAmount() as $reaction => $amount)
                                            <li class="reaction reaction--active pl-2">
                                                <div class="reaction__icon">
                                                    <i class="material-icons" class="reaction__icons">
                                                        {{ $reaction }}
                                                    </i>
                                                </div>
                                                <div class="reaction__count">
                                                    {{ $amount }}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @if(!(($key+1) % 3))
                    <div class="clearfix hide-on-med-and-down"></div>
                @endif
                
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
            user-id="{{ $user -> id }}"
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
