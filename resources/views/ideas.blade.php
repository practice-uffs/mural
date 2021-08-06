@extends('layouts.base')

@section('styles')
<link href="{{ asset('css/ideas.css') }}" rel="stylesheet">
@endsection

@section('wideTopContent')
<section class="hero d-flex align-items-center bulb-space">
    <div class="container-lg idea-body">
        <div class="row items-center justify-center">
            <div class="col-5 d-flex justify-content-center" data-aos="zoom-out" data-aos-delay="200">
                <!-- Bulb and animation from: https://codepen.io/MuT/pen/LYYoJZb -->
                <div class="fancy-bulb">
                    <div class="left-streaks streaks"></div>
                    <svg id="bulb" class="w-48 h-auto transform rotate-12" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 275.3 413.3" enable-background="new 0 0 275.3 413.3" xml:space="preserve">
                        <g id="off">
                            <path fill="#E2ECF1"
                                d="M137.7,13.7C67.2,13.7,10,70.9,10,141.4c0,58.3,72.8,118.2,79.9,162.3h47.8h47.8c7.1-44,79.9-103.9,79.9-162.3C265.3,70.9,208.2,13.7,137.7,13.7z" />
                        </g>
                        <g id="on">
                            <path fill="#FFDB55"
                                d="M137.7,13.7C67.2,13.7,10,70.9,10,141.4c0,58.3,72.8,118.2,79.9,162.3h47.8h47.8c7.1-44,79.9-103.9,79.9-162.3C265.3,70.9,208.2,13.7,137.7,13.7z" />
                        </g>
                        <g id="outline">
                            <path fill="#F1F2F2" stroke="#38434A" stroke-width="19.1022" stroke-miterlimit="10"
                                d="M168.5,375.5h-61.7c-8.9,0-16-7.2-16-16v-55.8h93.8v55.8C184.6,368.3,177.4,375.5,168.5,375.5z" />
                            <path fill="#F1F2F2" stroke="#38434A" stroke-width="19.1022" stroke-miterlimit="10"
                                d="M151.2,401.5h-27.1c-3.9,0-7-3.2-7-7v-19h41.1v19C158.2,398.4,155.1,401.5,151.2,401.5z" />
                            <line fill="none" stroke="#38434A" stroke-width="19.1022" stroke-miterlimit="10" x1="184.6"
                                y1="339.6" x2="90.8" y2="339.6" />
                            <path fill="none" stroke="#38434A" stroke-width="19.1022" stroke-miterlimit="10"
                                d="M137.7,13.7C67.2,13.7,10,70.9,10,141.4c0,58.3,72.8,118.2,79.9,162.3h47.8h47.8c7.1-44,79.9-103.9,79.9-162.3C265.3,70.9,208.2,13.7,137.7,13.7z" />
                        </g>
                        <g id="highlight">
                            <path fill="#FFDB55" stroke="#FFFFFF" stroke-width="21.0124" stroke-linecap="round"
                                stroke-miterlimit="10" d="M207.1,89.5c-12.3-16.1-28.4-29.1-46.9-37.8" />
                            <path fill="#FFDB55" stroke="#FFFFFF" stroke-width="21.0124" stroke-linecap="round"
                                stroke-miterlimit="10" d="M225,121.4c-0.8-2.2-1.8-4.4-2.7-6.5" />
                        </g>
                    </svg>
                    <div class="right-streaks streaks"></div>
                </div>
            </div>
            <div class="col-7 d-flex flex-column justify-center">
                <h1 data-aos="fade-up">Tem uma ideia?</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Ideias podem mudar a univerisade. Queremos ouvir as suas
                    para podermos transformá-las em realidade.</h2>
                <span data-aos="fade-up" data-aos-delay="500" class="text-md text-gray-500 mt-4"><strong>Dica:</strong>
                    clique na lâmpada ao lado para ver uma ideia 😁</span>
            </div>
        </div>
    </div>
</section>

<div class="idea-stream-container">
    @foreach ($groups as $group)
        @foreach ($group as $idea)
            <div class="idea-stream">        
                <div class="x{{ rand(1, 9) }}">
                    <div class="card w-96 transform {{ Arr::random(['', '-']) }}rotate-{{ Arr::random(['2', '3', '6']) }} shadow-lg compact side bg-base-100 p-2" style="top: {{ rand(10, 650) }}px; left: {{ rand(-600, 900) }}px">
                        <div class="flex-row items-center space-x-4 card-body">
                            <div>
                                <img src="{{ asset('img/ideas/bulb.svg') }}" class="w-14 h-14">
                            </div>
                            <div>
                                <h2 class="card-title">{{ $idea->title }}</h2>
                                <p class="text-base-content text-gray-500">{{ $idea->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
@endsection

@section('content')
<section>
    <div class="container">
        <header class="section-header">
            <h2>Compartilhe seus pensamentos</h2>
            <p>Qual é a sua ideia?</p>
        </header>

        <div class="row">
            <div class="col-8 offset-2">
                @livewire('crud.main', [
                    'model' => 'App\Model\Idea',
                    'show_list' => false,
                    'include_create' => [
                        'user_id' => $user->id,
                    ]
                ])
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script>
        var bulb = document.getElementById('bulb');
        var container = document.querySelector('.bulb-space');

        window.onload = function () {
            bulb.onclick = function () {
                container.classList.toggle('active');
            }
        }
    </script>
    @endsection