<header>
    <nav class="header">
        <div class="header__wrapper">
            <a href="{{ route('items.index', ['type' => Item::TYPE_FEEDBACK]) }}"
                class="header__logo hide-on-small-and-down"
            >
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>

            @if(Auth::check())
                <ul>
                    <li>
                        <a href="{{ route('items.index', ['type' => Item::TYPE_FEEDBACK]) }}"
                            class="
                                nav__link
                                @if ($current_item_type == Item::TYPE_FEEDBACK)
                                    nav__link--active
                                @endif
                            "
                        >
                            <i class="material-icons pr-1">
                                feedback
                            </i>
                            Feedback
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('items.index', ['type' => Item::TYPE_SERVICE]) }}" 
                            class="
                                nav__link
                                @if ($current_item_type == Item::TYPE_SERVICE)
                                    nav__link--active
                                @endif
                            "
                        >
                            <i class="material-icons pr-1">
                                shop
                            </i>
                            Serviços
                        </a>
                    </li>
                </ul>
            @endif

            <div class="header__auth right">
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