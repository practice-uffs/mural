@extends('layouts.app')

@section('content')

<header>
    <nav class="nav-extended">
        <div class="nav-wrapper grey lighten-5">
            <a href="#" class="brand-logo">
                <img src="{{ asset('img/logo-practice.png') }}" class="nav__img">
            </a>
            <ul id="nav-mobile" class="right">

            </ul>
        </div>

        <div class="nav-content grey lighten-2">

        </div>
    </nav>
</header>

<main class="container">
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                {{ $item -> title }}
            </div>

            <p>{{ $item -> description }}</p>

        </div>

        <div class="card__reaction">
            <ul class="reaction-list">
                <li class="reaction">
                    <div class="reaction__icon">
                        <i class="material-icons">error_outline</i>
                    </div>

                    <div class="reaction__count">
                        5
                    </div>
                </li>

                <li class="reaction">
                    <div class="reaction__icon">
                        <i class="material-icons">add</i>
                    </div>

                    <div class="reaction__count">
                        8
                    </div>
                </li>

                <li class="reaction">
                    <div class="reaction__icon">
                        <i class="material-icons">phone</i>
                    </div>

                    <div class="reaction__count">
                        2
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="timeline">
        <ul class="timeline__list">
            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">
                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>

                    <div class="timeline__reactions">
                        <ul class="reaction-list">
                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">error_outline</i>
                                </div>

                                <div class="reaction__count">
                                    5
                                </div>
                            </li>

                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">add</i>
                                </div>

                                <div class="reaction__count">
                                    8
                                </div>
                            </li>

                            <li class="reaction">
                                <div class="reaction__icon">
                                    <i class="material-icons">phone</i>
                                </div>

                                <div class="reaction__count">
                                    2
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">

                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                </div>
            </li>

            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">

                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                </div>
            </li>

            <li class="timeline__item">
                <div class="timeline__icon">
                    {{-- <i class="material-icons">error_outline</i> --}}
                </div>

                <div class="timeline__content">

                    <div class="timeline__title">
                        Jonh Doe
                    </div>

                    <div class="timeline__text">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                </div>
            </li>
        </ul>
    </div>
</main>

{{-- <div class="row">
    <div class="col-md-12 col-lg-12">
        <div id="timeline-pre"></div>
        <div id="timeline">
            <div class="timeline-list">
                <div class="timeline-item">
                    <div class="timeline-icon status-outfordelivery">
                        <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"></path>
                        </svg>
                        <!-- <i class="fas fa-shipping-fast"></i> -->
                    </div>
                    <div class="timeline-date">Jul 20, 2018<span>08:58 AM</span></div>
                    <div class="timeline-content">Shipment is out for despatch by KLHB023.<span>KUALA LUMPUR (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon status-inforeceived">
                        <svg class="svg-inline--fa fa-clipboard-list fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="clipboard-list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"></path>
                        </svg>
                        <!-- <i class="fas fa-clipboard-list"></i> -->
                    </div>
                    <div class="timeline-date">Jul 06, 2018<span>02:02 PM</span></div>
                    <div class="timeline-content">Shipment designated to MALAYSIA.<span>HONG KONG, HONGKONG</span></div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="banner">
    <img src="{{ asset('img/banner-practice.png') }}"
        alt="practice-banner" class="banner__img"
    >
</div>

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

@endsection
