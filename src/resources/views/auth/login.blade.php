<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Web Feedback · Login</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

<body class="align">
    <div class="grid align__item">
        <div class="login">
            <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412">
                <defs>
                    <linearGradient id="a" x1="0%" y1="0%" y2="0%">
                        <stop offset="0%" stop-color="#8ceabb" />
                        <stop offset="100%" stop-color="#378f7b" />
                    </linearGradient>
                </defs>
                <path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z" />
            </svg>

            <h2>Autenticação</h2>

            <form action="" method="post" class="form">
                @csrf

                <div class="form__field">
                    <label for="username">idUFFS</label>
                    <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Ex. fulano.silva" required autofocus>
                </div>

                <div class="form__field">
                    <label for="password">Senha</label>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Digite sua senha" required autocomplete="current-password">
                </div>

                <div class="form__field">
                    <input type="submit" value="Login">
                </div>
            </form>

            @if ($errors->any()) 
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
            @endif
        </div>
    </div>
</body>
</html>