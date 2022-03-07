@extends("layouts.base-raw", ["view_name" => "Login"])

@section('content')
    <div class="login container row mx-auto my-5 pt-5">
        <div class="login-img col-md-5 pr-lg-5 mb-5 mb-md-0 mt-5">
            <img src="assets/img/undow.co/login.svg" alt="" class="img-fluid">
            <h1>Conecte-se ao PRACTICE <b>Mural</b></h1>
            <p class="font-italic text-muted mb-0">Utilize seu idUFFS para conectar-se e aproveitar tudo que nossa plataforma
                oferece.</p>
        </div>

        <form id="loginForm" class="login-form col-md-6 mx-auto form-signin text-center " action="" method="post">
            @csrf
            <a href="{{ route('index') }}">
                <img class="mb-5" src="{{ asset('img/logo-practice.png') }}" alt="Logo do Practice" width="272">
            </a>
            <h1 class="h4 mb-3 font-weight-normal">Entre com seu idUFFS</h1>
            @if ($errors->any())
                <div class="alert-error text-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            @livewire('login.main')

            <!-- Divider Text -->
            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                <div class="border-bottom w-100 ml-5"></div>
                <div class="border-bottom w-100 mr-5"></div>
            </div>
            <nav class="login-help-links text-center mx-auto" role="navigation">
                <a href="https://id.uffs.edu.br/id/XUI/?realm=/#forgotUsername/">Não sabe seu IdUFFS?</a>
                <div>|</div>
                <a href="https://id.uffs.edu.br/id/XUI/?realm=/#passwordReset/">Esqueceu a Senha?</a>
                <div>|</div>
                <a href="https://ati.uffs.edu.br/public.pl?CategoryID=17">Ajuda</a>
            </nav>
        </form>
    </div>
@endsection
