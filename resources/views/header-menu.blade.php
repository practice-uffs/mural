@auth
    <li><a href="{{ route('home') }}" class="nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>
    <li><a href="{{ route('ideas') }}" class="nav-link @if (Route::is('ideas')) active @endif">Ideias</a></li>
    <li><a href="{{ route('feedbacks') }}" class="nav-link @if (Route::is('feedbacks')) active @endif">Feedbacks</a></li>
    <li><a href="{{ route('order.list') }}"class="nav-link @if (Route::is('order.list')) active @endif">Acompanhar serviços</a></li>
    <li><a href="{{ route('services') }}" class="nav-link @if (Route::is(['services', 'order.create'])) active @endif">Solicitar serviço</a></li>

    <li class="ml-8 mr-2 flex flex-row">
        <div class="text-right mt-1">
            <p class="font-semibold">{{ auth()->user()->first_name }}</p>
            <p class="text-xs font-extralight -mt-1 text-gray-400">{{ auth()->user()->username }}</p>
        </div>
        <div class="avatar ml-2">
            <div class="rounded-full w-10 h-10 m-1">
                <img src="https://cc.uffs.edu.br/avatar/iduffs/{{ auth()->user()->uid }}" />
            </div>
        </div>            
    </li>

    <li>
        <a href="{{ route('logout') }}">Sair</a>
    </li>
@endauth

@guest
    <li><a href="{{ route('ideas') }}" class="nav-link @if (Route::is('ideas')) active @endif">Ideias</a></li>
    <li><a href="{{ route('services') }}" class="nav-link @if (Route::is(['services', 'order.create'])) active @endif">Solicitar serviço</a></li>
    <li><a href="{{ route('login') }}" class="getstarted">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
@endguest