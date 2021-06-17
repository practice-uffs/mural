<header id="header" class="header fixed-top">
    <div class="container-lg d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/logo-practice.png') }}" alt="">
            <span>Mural</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @auth
                    <li><a href="{{ route('home') }}" class="nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>
                    <li><a href="{{ route('feedbacks') }}" class="nav-link @if (Route::is('feedbacks')) active @endif">Ideias</a></li>
                    <li><a href="{{ route('servicos/acompanhar') }}"class="nav-link @if (Route::is('servicos/acompanhar')) active @endif">Acompanhar serviços</a></li>
                    <li><a href="{{ route('servicos/solicitar') }}" class="nav-link @if (Route::is('servicos/solicitar')) active @endif">Solicitar serviço</a></li>

                    {{--@if(Auth()->user()->type == "admin")--}}
                        <li class="dropdown">
                            <!-- <a href="{{ route('admin') }}" class="nav-link @if (Route::is('admin')) active @endif" >Admin</a>-->
                            <div tabindex="0" class="m-1 btn btn-primary btn-outline">Admin <i class="bi bi-chevron-down"></i></div> 
                            <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
                                <li><a href="{{ route('admin.service') }}">Serviços</a></li> 
                                <li><a href="{{ route('admin.category') }}">Categorias</a></li> 
                                <li><a href="{{ route('admin.location') }}">Locais</a></li> 
                            </ul>
                        </li>
                    {{--@endif--}}

                    <li class="ml-8 mr-2">
                        <span class="font-semibold">{{ Str::title(Auth()->user()->name) }}</span>
                    </li>

                    <li class="flex-none">
                        <div class="avatar">
                            <div class="rounded-full w-10 h-10 m-1">
                                <img src="https://i.pravatar.cc/500?img=32">
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}">Sair</a>
                    </li>
                @endauth
                
                @guest
                    <li><a class="getstarted" href="{{ route('login') }}">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
                @endguest
            </ul>
        </nav>

    </div>
</header>