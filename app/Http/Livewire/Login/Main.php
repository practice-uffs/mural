<?php

namespace App\Http\Livewire\Login;

use Livewire\Component;

class Main extends Component
{
    public int $countDown = 0;
    public bool $disabledSubmit;

    public function __construct()
    {
        $this->countDown = env("TIMEOUT_LOGIN");
        $this->disabledSubmit = false;
    }

    public function render()
    {
        if (session("_loginAttempts") == 0 && $this->countDown > 0) {
            $this->disabledSubmit = true;
            $this->countDown--;
        } else if ($this->countDown == 0) {
            session(["_loginAttempts" => env('LOGIN_ATTEMPTS')]);
            $this->disabledSubmit = false;
        }
        return view('livewire.login.main');
    }
}
