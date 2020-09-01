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