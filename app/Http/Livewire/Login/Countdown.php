<?php

namespace App\Http\Livewire\Login;

use Livewire\Component;

class Countdown extends Component
{
    public $countdown;

    public function render()
    {
        return view('livewire.countdown');
    }

    public function startTimeoutLogin()
    {
        session(["_timeoutLogin" => env("TIMEOUT_LOGIN")]);
        for ($this->countdown = session()->get("_timeoutLogin"); $this->countdown >= 0; $this->countdown--) {
            session(["_timeoutLogin" => $this->countdown]);
            sleep(1);
        }
        // session(["_loginAttempts" => env("LOGIN_ATTEMPTS")]);
    }
}
