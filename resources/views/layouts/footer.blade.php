<!-- ======= Footer ======= -->
<footer id="footer" class="footer mt-12">
    <div class="footer-top bg-gray-200">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12 text-left">
                    <div class="row">
                        <div class="col-lg-12 text-left">
                          <h4>
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                              </svg>
                              Nossa Newsletter
                          </h4>
                          <p>Fique por dentro de todas as novidades do programa e dos projetos que estamos trabalhando.
                            Inscreva-se para receber periodicamente a nossa newsletter em seu e-mail. </p>
                        </div>
                        <div>
                            <form action="{{ route('subscribers.store') }}" method="post">
                                @csrf
                                <div class="relative mt-3">
                                    <input type="email" name="email" placeholder="Ex. fulano@email.com" class="w-full pr-16 input input-primary input-bordered"> 
                                    <button class="absolute right-0 top-0 rounded-l-none btn btn-primary">Inscrever</button>
                                </div>
                            </form>

                            <p class="text-xs text-gray-500 mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Tambem odiamos spam! Enviamos e-mails interessantes e com baixa frequência.
                            </p>
                        </div> 
                    </div>
                </div>

                <div class="col-lg-3 pl-16">
                    <h4>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        Divulgação
                    </h4>
                    <ul>
                        <li class="mb-2"><i class="bi bi-chevron-right"></i> <a
                                href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-audio-e-video.pdf"
                                target="_blank">Serviços de áudio</a></li>
                        <li class="mb-2"><i class="bi bi-chevron-right"></i> <a
                                href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-conteudo.pdf"
                                target="_blank">Serviços de conteúdo</a></li>
                        <li class="mb-2"><i class="bi bi-chevron-right"></i> <a
                                href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-Estudio.pdf"
                                target="_blank">Serviços de estúdio</a></li>
                        <li class="mb-2"><i class="bi bi-chevron-right"></i> <a
                                href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos-de-eventos-online.pdf"
                                target="_blank">Serviços de eventos online</a></li>
                        <li class="mb-2"><i class="bi bi-chevron-right"></i> <a
                                href="https://cdn.uffs.cc/practice/website/marketing/PRACTICE-Panfleto-Servicos.pdf"
                                target="_blank">Visão geral</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-md-12 footer-contact text-center text-md-start">
                    <h4>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        Contato
                    </h4>
                    <span class="block mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:practice@uffs.edu.br">practice@uffs.edu.br</a>
                    </span>

                    <span class="block mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                        </svg>
                        <a href="https://practice.uffs.edu.br">practice.uffs.edu.br</a>
                    </span>

                    <span class="inline-flex sm:ml-auto sm:mt-0 justify-center sm:justify-start mb-2">
                        <a href="https://www.instagram.com/practice-uffs/"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a>
                        <a href="https://www.youtube.com/channel/UCu3jAl8MTMPkaxb3u0_xESw" class="ml-2"><i class="bi bi-youtube" style="font-size: 1.5rem;"></i></a>
                        <a href="https://github.com/practiceuffs" class="ml-2"><i class="bi bi-github" style="font-size: 1.5rem;"></i></a>
                        <a href="https://twitter.com/PracticeUFFS" class="ml-2"><i class="bi bi-twitter" style="font-size: 1.5rem;"></i></a>
                        <a href="https://www.facebook.com/Practice-UFFS-104348284683285" class="ml-2"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a>
                        <a href="https://www.linkedin.com/company/practiceuffs" class="ml-2"><i class="bi bi-linkedin bx bxl-linkedin" style="font-size: 1.5rem;"></i></a>
                    </span>

                    <span class="mt-2 block text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-semibold">Atuações</span>
                        <p class="text-gray-500">
                            Campus Erechim (RS), Cerro Largo (RS), Passo Fundo (RS), Chapecó (SC), Realeza (PR) e Laranjeiras do Sul (PR).
                            <a href="https://www.uffs.edu.br">Universidade Federal da Fronteira Sul (UFFS)</a>.
                        </p>
                    </span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="text-sm text-gray-400 mt-10">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>.
                As imagens utilizadas nesse site tem como fonte <a href="https://undraw.co/" rel="nofollow" target="_blank">undraw.co</a>. Created by <a href="https://twitter.com/ninaLimpi" rel="nofollow" target="_blank">Katerina Limpitsouni</a>.
                Code / Design by <a href="https://twitter.com/anges244" rel="nofollow" target="_blank" style="color: #bfbfbf;">Aggelos Gesoulis</a>.
            </div>
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="container py-6 mx-auto flex items-center sm:flex-row flex-col">
            <p class="text-sm text-gray-400">
                Feito com ❤️ pela 
                <a href="https://practice.uffs.cc/equipe/" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">equipe Practice</a>
            </p>
            <p class="text-sm text-gray-400 ml-6 mr-6">|</p>
            <p class="text-sm text-gray-400">
                <a href="https://github.com/practice-uffs/mural" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">v{{ config('app.version') }}</a>
            </p>
            <p class="text-sm text-gray-400 ml-6 mr-6">|</p>
            <p class="">
                <a href="https://github.com/practiceuffs" class="ml-2 text-gray-500 text-sm">Esse software é open-source e gratuíto <i class="bi bi-github" style="font-size: 1.1rem;"></i></a>
            </p>
        </div>
    </div>
</footer><!-- End Footer -->