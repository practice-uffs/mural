<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-theme="light">
    <head>
        <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf-token" content="{{ csrf_token()}}">
          <script>window.Laravel = {csrfToken:'{{ csrf_token() }}'}</script>
          <title>Mural - PRACTICE</title>

          <meta content="" name="description">
          <meta content="" name="keywords">

          <!-- Favicons -->
          <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

          <!-- Vendor CSS Files -->
          <link href="{{ asset('vendor/bootstrap-5.0.0/css/bootstrap.min.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
          <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

          <!-- Template Main CSS File -->
          <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
          <link href="{{ asset('css/app.css') }}?20220222" rel="stylesheet">

          <!-- Page styles -->
          @yield('styles')

          <!-- =======================================================
          * Template Name: FlexStart - v1.0.0
          * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
          * Author: BootstrapMade.com
          * License: https://bootstrapmade.com/license/
          ======================================================== -->
          @livewireStyles
    </head>
    <body>
        @include('layouts.header')
        @yield('wideTopContent')

        <div class="container-lg mt-10">
            @yield('content')
        </div>


        @yield('wideBottomContent')
        @include('layouts.footer')


        <img id="aura_span" class="d-none" height="45px" width="45px" src="{{ asset('img/aura/aura_icon.png') }}" />

        <iframe id="aura_iframe" class="d-none " src="{{ env('API_URL') }}v0/widgets/aura?token={{ Auth::user()->orcreatejwt ?? '' }}" frameborder="0"></iframe>
           
        <script>
            var IsClicked = false
            document.getElementById('aura_span').onclick = function(e){
                IsClicked = !IsClicked
                if (IsClicked){
                    document.getElementById("aura_iframe").classList.remove('d-none');
                    document.getElementById("aura_span").classList.add("close-button");
                    if (window.outerWidth < 450)
                        document.querySelector(".back-to-top").classList.add('d-none');
                } else {
                    document.getElementById("aura_iframe").classList.add('d-none')
                    document.getElementById("aura_span").classList.remove("close-button");
                    document.querySelector(".back-to-top").classList.remove('d-none');
                }
            }
            var xmlHttp = new XMLHttpRequest();
            try {
                xmlHttp.open( "GET", "{{ env('API_URL') }}v0/widgets/aura", false )

                document.getElementById("aura_span").classList.remove('d-none')

                xmlHttp.onreadystatechange = () => {
                    if (xmlHttp.status == 404) {
                        document.getElementById("aura_span").classList.add('d-none')
                    }
                };
                xmlHttp.send( null );
            } catch(err) {
                console.log(err)
                document.getElementById("aura_span").classList.add('d-none')
            }

        </script>


        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-SYT1Y1FGPE"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-SYT1Y1FGPE');
        </script>


        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-5.0.0/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>

        @livewireScripts

        <!-- Template Main JS File -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js')}}"></script>

        <!-- Page scripts -->
        @yield('scripts')





        <div id="popup-container" class="popup-container">
            <!--Proporção-->
            <div class="popup-align">
                <!--Content-->
                <div class="popup-content"> 
                  
                    <!--Titulo-->
                    <h1 style="font-weight:100;font-size:2em;color:#E43; text-align:center ">Aviso importante!</h1>
                    <br><br>
                    <!--Texto-->
                    <p style="font-size: 16px;">
                        É de conhecimento geral que nos últimos dias houve um novo corte no recurso financeiro destinado às universidades, mas desta vez, um dos grupos que mais sofreram o impacto dessa ação infundada foram os bolsistas, que tiveram suas bolsas retidas sem aviso prévio, acarretando em diversos transtornos e dificuldades financeiras, principalmente para aqueles que dependem desse recurso para sobrevivência e permanência na universidade.
                        <br><br>
                        Sendo assim, nós, bolsistas do PRACTICE, comunicamos que estamos paralisando nossas atividades até que o pagamento das bolsas seja normalizado, e dessa forma, tenhamos condições favoráveis para continuar atuando novamente. Durante esse período, nenhuma nova solicitação será aceita, e nenhum outro serviço será realizado.
                        <br><br>
                        O PRACTICE é um programa de extrema relevância dentro e fora da comunidade acadêmica, pois desde 2020 trabalhamos arduamente para atender a todas as solicitações que chegam até nós, bem como entregar produtos e serviços de qualidade, e o reflexo disso são todas as lives, cartilhas, panfletos, identidades visuais,  e centenas de outros serviços já foram entregues durante todo esse tempo.
                        <br><br>
                        Vale ressaltar que o PRACTICE é um programa interdisciplinar e multicampi, então a medida que se faz necessário o envolvimento de bolsistas de diversos cursos e campi para atender as demandas, todos estes estão sendo prejudicados diante dessa situação inesperada, o que torna o problema ainda mais grave.
                        <br><br>
                        Esperamos que nos próximos dias todo esse cenário seja revertido, e que tanto nós, bolsistas, como todos aqueles que estão sendo prejudicados, possam se restabelecer e continuar trabalhando a serviço da comunidade.</p>
                </div>
            </div>       
        </div>

        <style>
            .popup-container{
                position: fixed; 
                right: 0;
                top: 0;
                width:100%; 
                height:100vh; 
                background-color: rgba(0, 0, 0, 0.5) ; 
                display:flex; 
                justify-content: center; 
                align-items: center;
                font-family:Roboto;
                color:#999; 
                z-index: 1000
            }

            .popup-align{
                height: auto;
                max-width: 50vw;
              
         
                background-color: #EEEEF4;
                box-shadow: 1px 0px 5px black;
                border-radius: 10px; 
                padding: 50px;
                padding-right: 0;
            }

            .popup-content{
                width: auto;
                height: 100%;                
                max-height: 70vh;
                overflow-y: scroll;
                overflow-x: hidden;
                padding-right: 50px;
                text-align:justify;
            }

            @media screen and (max-width: 900px) {
                .popup-align{
                   max-width: 90vw;
                }
            }
            
        </style>


    </body>
</html>
