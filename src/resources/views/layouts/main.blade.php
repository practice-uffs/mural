<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TCCr') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/tccr.css') }}" media="screen">

    <!-- Priority scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-dark bg-dark">
                <div class="col-sm-2 brand">
                    <img src="{{ asset('img/logo/grintex-logo-white-transparent.png') }}" title="Grintex" />
                </div>
                <div class="col-sm-3 text-left">
                    <span class="navbar-text"></span>
                </div>
                <div class="col-sm-6 text-right">
                    <span class="navbar-text user-info">
                        <strong>{{ ucwords(trim(strtolower($user->name))) }}</strong><br />
                        <span>{{ $user->username }}</span>
                    </span>
                </div>
                <div class="col-sm-1">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="https://colorlib.com/polygon/sufee/images/admin.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="https://id.uffs.cc"><i class="icon ion-md-contact"></i>Meu perfil</a>
                            <a class="nav-link" href="{{ route('logout') }}"                           
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="icon ion-md-log-out"></i>
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
    
    <footer class="" style="display: none;">
        <div class="container">
            <div class="row align-items-top text-center text-md-left">
                <div class="col-4 text-md-left">
                    <h3>Sobre</h3>
                    <p class="small">Esse site foi criado pelo <a href="https://grintex.uffs.cc">Grupo de Inovação Tecnológica Experimental (GRINTEX)</a> da <a href="http://uffs.edu.br" target="_blank">Universidade Federal da Fronteira Sul</a>, campus Chapecó/SC. Ele é coordenado por membros do curso de <a href="https://cc.uffs.edu.br">Ciência da Computação</a> com participação de várias entidades, como a Secretaria Especial de Tecnologia da Informação (SETI).</p>
                </div>

                <div class="col-2"></div>

                <div class="col-3">
                    <h3>Country B</h3>
                    <p>Street Address 100<br>Contact Name</p>
                    <p>+13 827 312 5002</p>
                    <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
                </div>

                <div class="col-3">
                    <h3>Country B</h3>
                    <p>Street Address 100<br>Contact Name</p>
                    <p>+13 827 312 5002</p>
                    <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
                    <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
                    <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts related to integration with external APIs -->
    <script src="{{ config('app.apicc_url').'/libs/3rdparty/flexsearch.compact.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.apicc_url').'/libs/3rdparty/axios.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.apicc_url').'/libs/3rdparty/signals.min.js' }}" type="text/javascript"></script>
    <script src="{{ config('app.apicc_url').'/libs/iduffs@dev/autocomplete.js' }}" type="text/javascript"></script>
    
    <!-- App scripts -->
    <script src="{{ asset('js/3rdparty/jquery.min.js') }}"></script>
    <script src="{{ asset('js/3rdparty/bootstrap.bundle.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/3rdparty/store.everything.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/tccr.js') }}" type="text/javascript" charset="utf-8"></script>

    <!-- Page-specific scripts --> 
    @yield('scripts')
</body>
</html>