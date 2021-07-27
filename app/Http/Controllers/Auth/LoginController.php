<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Model\User;
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
            return redirect()->route('login')->withErrors([
                'credential' => 'Login ou senha inválidos, por favor verifique os dados e tente novamente.'
            ]);
        }

        $userData->password = bcrypt($userData->pessoa_id);
        $user = $this->getOrCreateUser($userData);
        
        Auth::login($user);
        
        return redirect()->route('home');
    }

    public function logout(Request $resquest)
    {
        Auth::logout();
        return redirect()->intended('login');
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
}
