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

                            <button type="submit" class="btn waves-block card__btn my-3 mx-auto">
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
</main>
@endsection