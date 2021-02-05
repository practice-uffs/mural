@extends("layouts.main", ["view_name" => "Login"])

@section('content')
<div class="m-5 p-5 mx-auto col-4">
    
    <form class="form-signin text-center " action="" method="post" >
        @csrf
        <img class="mb-4" src="https://practice.uffs.cc/images/logo.png" alt="" width="272" >
        <h1 class="h3 mb-3 font-weight-normal">Entre com seu idUFFS</h1>
        @if ($errors->any()) 
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <label for="inputEmail" class="sr-only">idUFFS</label>
        <input type="text" id="inputEmail" placeholder="idUFFS" required="" autofocus=""
               name="username" value="{{ old('username') }}"
               class="form-control validate @error('username') is-invalid @enderror card__input" >

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="password"  placeholder="Senha" required=""
               class="form-control @error('password') is-invalid @enderror validate card__input"
               autocomplete="current-password">

        <button class="btn btn-lg btn-warning btn-block mt-5" type="submit">Entrar</button>
      </form>
</div>
@endsection