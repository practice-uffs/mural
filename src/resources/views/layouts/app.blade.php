<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Web Feedback {{ isset($view_name) ? '· ' . $view_name : '' }} </title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        
        @yield('header')

        <div id="app">
            @yield('content')
        </div>

        <!-- Practice Banner -->
        <div class="banner">
            <img src="{{ asset('img/banner-practice.png') }}"
                alt="practice-banner" class="banner__img"
            >
        </div>

        <!-- WebFeedback Footer -->
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h4 class="white-text">Web Feedback</h4>
                        <p class="grey-text text-lighten-4">
                            Web Feedback é um projeto que objetiva estreitar a comunicação
                            entre a comunidade UFFS e o programa Practice. Com ele é possível
                            que você publique seus comentários, sugestões e ideias voltadas para
                            a melhoria do ensino e da educação para que assim o Practice tenha 
                            facilidade no planejamento e execução de seus projetos.
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Saiba mais</h5>
                        <ul>
                            <li>
                                <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/sobre/" target="blank">
                                    Sobre
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/equipe/" target="blank">
                                    Quem somos 
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="https://practice.uffs.cc/parcerias" target="blank">
                                    Parcerias
                                </a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="https://github.com/practice-uffs" target="blank">
                                    Github
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <p class="grey-text text-lighten-4 left">
                        © 2020 All rights reserved.
                    </p>
                    <p class="grey-text text-lighten-4 right">
                        Powered by
                        <a class="grey-text text-lighten-4" href="htpps://materializecss.com">
                        MaterializeCSS
                    </a>
                    </p>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
