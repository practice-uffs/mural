<div>
    <!-- idUFFS -->
    <div class="input-group col-lg-6 mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="bi bi-person text-muted"></i>
            </span>
        </div>
        <input type="text" placeholder="idUFFS" required="" autofocus="" name="username" value="{{ old('username') }}"
            placeholder="idUFFS" class="form-control validate @error('username') is-invalid @enderror card__input"
            @if ($disabledSubmit == true) disabled @endif>

    </div>
    <!-- Password -->
    <div class="input-group col-lg-6 mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
                <i class="bi bi-lock-fill text-muted"></i>
            </span>
        </div>
        <input type="password" name="password" placeholder="Senha" required="" placeholder="Senha"
            class="form-control @error('password') is-invalid @enderror validate card__input"
            autocomplete="current-password" @if ($disabledSubmit == true) disabled @endif>
    </div>

    @if (session()->get('_loginAttempts') == 0)
        <div wire:poll.1000ms.visible>
            <span>
                <p class="user-select-none text-center text-muted">
                    <b>Login bloqueado</b><br>
                    Tentativas novamente em {{ $countDown }} segundos
                </p>
            </span>
        </div>
    @else
        <span>
            <p class="user-select-none text-center text-muted">
                Tentativas Restantes: {{ session()->get('_loginAttempts') }}
            </p>
        </span>
    @endif

    <button type="submit" id="btn-submit" class="btn btn-lg btn-block btn-primary col-12"
        onclick="el = document.getElementById('btn-submit'); el.innerHTML = '<i class=\'bi bi-arrow-repeat\'></i>'; el.disabled = true; el.innerHTML = '<div class=\'spinner-border\'></div> Aguarde'; document.forms.loginForm.submit();"
        @if ($disabledSubmit == true)
        disabled
        @endif>
        ENTRAR</button>
</div>
