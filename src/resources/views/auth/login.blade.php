@extends("layouts.app", ["view_name" => "Login"])

@section('content')
<main>
    <div class="mt-5">
        <div class="row">
            <div class="col m6 l4 xl4 offset-m3 offset-l4 offset-xl4">
                <form action="" method="post" class="form">
                    @csrf
                    <div class="card">
                        <div class="card-content p-3">

                            <div class="card-image">
                                <img src="https://practice.uffs.cc/images/logo.png" alt="practice-logo">
                            </div>

                            <div class="input-field mx-4">
                                <input id="username" type="text" name="username" value="{{ old('username') }}"
                                    class="validate @error('username') is-invalid @enderror card__input" 
                                    required autofocus autocomplete="off"
                                >
                                <label for="username" class="input__label">
                                    idUFFS
                                </label>
                            </div>
                            <div class="input-field mx-4">
                                <input id="password" type="password" 
                                        class="@error('password') is-invalid @enderror validate card__input"
                                        autocomplete="current-password"
                                        name="password" required
                                >
                                <label for="password" class="input__label">
                                    Senha
                                </label>
                            </div>

                            <button type="submit" class="btn waves-block card__btn my-3">
                                Login
                            </button>

                            @if ($errors->any()) 
                                <div class="alert-error">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="banner">
        <img src="{{ asset('img/banner-practice.png') }}" 
            alt="practice-banner" class="banner__img"
        >
    </div>
</main>
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