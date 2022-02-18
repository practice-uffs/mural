<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("Look: ".session()->get("_loginAttempts"));

        if (session()->get("_loginAttempts") == null && session()->get("_loginAttempts") != 0){
            $output->writeln("FOI NO NULLL PORA");
            session(["_loginAttempts" => env('LOGIN_ATTEMPTS')]);
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'user'     => strtolower($request->input('username')),
            'password' => $request->input('password'),
        ];

        $auth = new \CCUFFS\Auth\AuthIdUFFS();
        $userData = $auth->login($credentials);

        if (!$userData) {
            session(["_loginAttempts" => session()->get("_loginAttempts")-1]);

            return redirect()->route('login')->withErrors([
                'credential' => 'Login ou senha inválidos, por favor verifique os dados e tente novamente.'
            ]);
        }

        $userData->password = bcrypt($userData->pessoa_id);
        $user = $this->getOrCreateUser($userData);

        Auth::login($user);
        session(["_loginAttempts" => env("LOGIN_ATTEMPTS")]);

        return redirect()->intended();
    }

    public function logout(Request $resquest)
    {
        Auth::logout();
        return redirect()->route('index');
    }

    private function getOrCreateUser($data)
    {
        $user = User::where('uid', $data->uid)->first();
        $data = [
            'username' => $data->username,
            'password' => $data->password,
            'email' => $data->email,
            'uid' => $data->uid,
            'name' => $data->name,
            'cpf' => $data->cpf
        ];

        if ($user) {
            $user->update($data);
        } else {
            $user = User::create($data);
            UserCreated::dispatch($user);
        }

        return $user;
    }

    public function startTimeoutLogin()
    {
        session(["_timeoutLogin" => env("TIMEOUT_LOGIN")]);
        for ($count = session()->get("_timeoutLogin"); $count >= 0; $count--){
            session(["_timeoutLogin" => $count]);
            sleep(1);
        }
        // session(["_loginAttempts" => env("LOGIN_ATTEMPTS")]);
    }
}
