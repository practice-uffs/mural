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

    <body>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-md-5 col-xl-4">
                    <div class="card mt-5">
                        <div class="card-body">
                            <img src="https://practice.uffs.cc/images/logo.png" alt="practice-logo" class="site__logo">

            <h2>Autenticação</h2>

                            <form action="" method="post" class="form">
                                @csrf

                                <div class="form__field">
                                    <label for="username">
                                        idUFFS
                                    </label>
                                    <input id="username" type="text" class="@error('username') is-invalid @enderror" 
                                        name="username" value="{{ old('username') }}" placeholder="Ex. fulano.silva" 
                                        required autofocus
                                    >
                                </div>

                                <div class="form__field">
                                    <label for="password">
                                        Senha
                                    </label>
                                    <input id="password" type="password" 
                                        class="@error('password') is-invalid @enderror" name="password"
                                        placeholder="Digite sua senha" required autocomplete="current-password"
                                    >
                                </div>

                                <div class="form__field">
                                    <input type="submit" value="Login" class="field__submit">
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