<header id="header" class="header fixed-top">
    <div class="container-lg d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/mural-icon.png') }}" alt="">
            <span>Mural</span>
        </a>

        <nav id="navbar" class="navbar oculto">
            <ul>
                @auth
                    @admin
                        <li class="dropdown ml-3">
                            <div tabindex="0" class="btn btn-primary btn-outline">Admin <i class="bi bi-chevron-down"></i></div>
                            <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
                                <li><a href="{{ route('admin.orders') }}">Pedidos</a></li> 
                                <li><hr /></li> 
                                <li><a href="{{ route('admin.service') }}">Serviços</a></li> 
                                <li><a href="{{ route('admin.category') }}">Categorias</a></li> 
                                <li><a href="{{ route('admin.location') }}">Locais</a></li> 
                                <li><hr /></li> 
                                <li><a href="{{ route('admin.user') }}">Usuários</a></li> 
                                <li><a href="{{ route('admin.subscriber') }}">Newsletter</a></li>
                            </ul>
                        </li>
                    @endadmin
                @endauth                
                @include('header-menu')
            </ul>
        </nav>

        <nav class="lg:invisible absolute left-1 w-full d-flex justify-content-end">
            @admin
                <li class="dropdown ml-3">
                    <div tabindex="0" class="btn btn-primary btn-outline" data-bs-toggle="dropdown" aria-expanded="false">Admin <i class="bi bi-chevron-down"></i></div>
                    <ul class="shadow dropdown-menu bg-base-100 rounded-box w-52">
                        <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.orders') }}">Pedidos</a></li> 
                        <li class="dropdown-item"><hr /></li> 
                        <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.service') }}">Serviços</a></li> 
                        <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.category') }}">Categorias</a></li> 
                        <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.location') }}">Locais</a></li> 
                        <li class="dropdown-item"><hr /></li> 
                        <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.user') }}">Usuários</a></li> 
                        <li class="dropdown-item"><a class="nav-link" href="{{ route('admin.subscriber') }}">Newsletter</a></li>
                    </ul>
                </li>
            @endadmin
            <li class="dropdown mx-2 pr-2">
                <div tabindex="0" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">Menu <i class="bi bi-chevron-down"></i></div>
                <ul class="dropdown-menu rounded-box">
                    @include('header-menu')
                </ul>
            </li>
        </nav>
    </div>
</header>