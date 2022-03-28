@auth
    <li class="dropdown-item"><a href="{{ route('ideas') }}" class="nav-link @if (Route::is('ideas'))  @endif">Ideias</a></li>
    <li class="dropdown-item"><a href="{{ route('feedbacks') }}" class="nav-link @if (Route::is('feedbacks')) active @endif">Feedbacks</a></li>
    <li class="dropdown-item"><a href="{{ route('order.list') }}"class="nav-link @if (Route::is('order.list')) active @endif">Acompanhar serviços</a></li>
    <li class="dropdown-item"><a href="{{ route('services') }}" class="nav-link @if (Route::is(['services', 'order.create'])) active @endif">Solicitar serviço</a></li>

    <li><hr class="dropdown-divider d-xl-none"></li>

    <li class="dropdown-item d-flex d-xl-none justify-content-between">
        <div tabindex="0" class="avatar ml-2">
            <div class="rounded-full w-10 h-10 m-1">
                <img src="https://cc.uffs.edu.br/avatar/iduffs/{{ auth()->user()->uid }}" />
            </div>
        </div> 
        <div class="text-right mt-1">
            <p class="font-semibold">{{ auth()->user()->first_name }}</p>
            <p class="text-xs font-extralight -mt-1 text-gray-400">{{ auth()->user()->username }}</p>
        </div>
    </li>

    <li class="dropdown-item d-xl-none"><a href="{{ route('logout') }}">Sair</a></li>
    <li class="dropdown-item d-xl-none"><a href="{{ route('home') }}" class="pl-0 nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>


    <li class="dropdown ml-8 mr-2 flex flex-row d-none d-xl-flex">
        <div class="text-right mt-1">
            <p class="font-semibold">{{ auth()->user()->first_name }}</p>
            <p class="text-xs font-extralight -mt-1 text-gray-400">{{ auth()->user()->username }}</p>
        </div>
        <div tabindex="0" class="avatar ml-2">
            <div class="rounded-full w-10 h-10 m-1">
                <img src="https://cc.uffs.edu.br/avatar/iduffs/{{ auth()->user()->uid }}" />
            </div>
        </div>  
        <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li><a href="{{ route('logout') }}">Sair</a></li>
            <li><a href="{{ route('home') }}" class="nav-link @if (Route::is('home')) active @endif" >Inicial</a></li>
        </ul>
    </li>
@endauth

@guest
    <li class="dropdown-item"><a href="{{ route('ideas') }}" class="nav-link @if (Route::is('ideas')) active @endif">Ideias</a></li>
    <li class="dropdown-item"><a href="{{ route('services') }}" class="nav-link @if (Route::is(['services', 'order.create'])) active @endif">Solicitar serviço</a></li>
    <li class="dropdown-item"><a href="{{ route('login') }}" class="nav-link getstarted">Entrar <i class="bi bi-box-arrow-in-right"></i></a></li>
@endguest