<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | idUFFS CC</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        html {
            height: 100%;
        }

        body {
            background-color: #1C1E1F;
            color: #8f8f8f;
            font: 100 1rem/1.5 Helvetica Neue, sans-serif;
            margin: 0;
            min-height: 100%;
        }

        .align {
            align-items: center;
            display: flex;
            flex-direction: row;
        }

        .align__item--start {
            align-self: flex-start;
        }

        .align__item--end {
            align-self: flex-end;
        }

        .site__logo {
            margin-bottom: 2rem;
        }

        input {
            border: 0;
            font: inherit;
        }

        input::placeholder {
            color: #5B5A5B;
        }

        .form__field {
            margin-bottom: 1rem;
            width: 100%;
        }

        .form input {
            outline: 0;
            padding: .5rem 1rem;
            width: 100%;
        }

        .grid {
            margin: 0 auto;
            max-width: 25rem;
            width: 100%;
        }

        h2 {
            font-size: 1.5em;
            font-weight: 100;
            margin: 0 0 2rem;
        }

        svg {
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }

        a {
            color: #7e8ba3;
        }

        .login {
            box-shadow: 0 0 250px #000;
            text-align: center;
            padding: 2rem 2rem;
            border: solid 1px #2B2A2B;
        }

        .login label {
            color: #6f6f6f;
        }

        .login input {
            border: 1px solid #5B5A5B;
            border-radius: 5px;
            background-color: #1A1A1A;
            text-align: center;
            outline: none;
            color: #fff;
            margin-top: 0.2em;

            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
        }

        .login input:focus {
            border: solid 1px #00C483;
        }

        .login input[type="submit"] {
            background: #00C483;
            border: solid 1px #00C483;
            color: #000;
            font-weight: bold;
            margin-bottom: 1rem;
            margin-top: 1em;
            width: 50%;
            cursor: pointer;
        }

        .alert {
            color: #fc392b;
            border: dashed 1px #fc392b;
            padding: 0.8em;
        }
    </style>
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