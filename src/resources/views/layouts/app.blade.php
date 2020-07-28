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
                    <p class="grey-text text-lighten-4 left footer__rights--sm-center">
                        Projeto licenciado sobre os termos da
                        <a href="https://www.apache.org/licenses/LICENSE-2.0" target="_blank" class="footer__link">
                            Apache License.
                        </a>
                    </p>
                    <p class="grey-text text-lighten-4 right footer__rights--sm-center">
                        Build with 
                        <svg class="footer__heart" viewBox="0 0 32 29.6">
                            <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
                            c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                        </svg> 
                        by 
                        <a href="https://pt.wikipedia.org/wiki/C%C3%B3digo_aberto" target="_blank"
                            rel="noopener noreferrer" class="footer__link"
                        >
                            OpenSource Community.
                        </a>
                    </p>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
