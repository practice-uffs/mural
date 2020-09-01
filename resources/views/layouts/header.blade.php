<header>
    <nav class="header nav-extended">
        <div class="header__wrapper">
            <a href="{{ route('items.index') }}"
                class="header__logo"
            >
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>

            <div class="header__auth">
                @if (Auth::check())
                    <div class="header__user-info mr-2 pt-3">
                        <div>
                            {{ $user->uid }}
                        </div>
                        <div>
                            {{ $user->name }}
                        </div>
                    </div>
                    <a class="nav__link dropdown-trigger" data-target="userMenu">
                        <img src="{{asset('img/avatars/avatar-' . ($user->id % 4 + 1) . '.png') }}" 
                            class="header__avatar" alt="Avatar" height="45"
                        >
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

        @if (Auth::check() && ($home ?? false))
            <div class="header__nav">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#feedbacks">Feedbacks</a></li>
                    <li class="tab"><a href="#services">Serviços</a></li>
                </ul>
            </div>
        @endif
    </nav>
</header>