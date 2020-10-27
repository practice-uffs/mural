<nav class="navbar navbar-expand-sm navbar-dark bg-light mb-2 ">
    <div class="container d-flex justify-content-between">
        <a href="/" class="navbar-brand">
             <img src="{{ asset('img/logo-practice.png') }}" width="140" alt="Logo Practice">
        </a>
        @if (Auth::check())
        <div class="d-flex align-items-center ">                     
            <div>
                {{ Auth()->user()->uid }}
            </div>
            <a class="nav__link dropdown-trigger" data-target="userMenu">
                <img src="{{asset('img/avatars/avatar-' . (auth()->user()->id % 4 + 1) . '.png') }}" 
                    class="header__avatar" alt="Avatar" height="35"
                >
            <a href="{{ route('logout') }}" class="text-primary"> Sair</a>
            </div>
        </div>
        @else
        <a href="/login" class="nav-link d-flex align-items-center"><i class="material-icons">login</i> Entrar </a>
        @endif
        
    </div>
</nav>
