<header id="header" class="header fixed-top">
    <div class="container-lg d-flex align-items-center justify-content-between">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/logo-practice.png') }}" alt="">
            <span>Mural</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @auth
                    @admin
                        <li class="dropdown ml-3 bg-white">
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

        <nav class="md:invisible absolute left-2 w-full bg-white">
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

            <li class="dropdown ml-3">
                <div tabindex="0" class="btn btn-primary">Menu <i class="bi bi-chevron-down"></i></div>
                <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52 mr-24">
                    @include('header-menu')
                </ul>
            </li>
        </nav>
    </div>
</header>