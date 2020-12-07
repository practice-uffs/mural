<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    const ADMIN_USERS = [
        'jean.hilger',
        'junior.ramisch',
        'raphael.santos'
    ];

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'user'     => $request->input('username'),
            'password' => $request->input('password'),
        ];

        $auth = new \CCUFFS\Auth\AuthIdUFFS();
        $userData = $auth->login($credentials);
        $userData->password = bcrypt($userData->pessoa_id);

        if (!$userData) {
            return redirect()
                ->route('login')
                ->withErrors([
                    'credential' => 'Login inválido, tente novamente.'
                ]);
        }
        $user = $this->getOrCreateUser($userData);

        Auth::login($user);
        return redirect()->route('index');
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

        if (in_array($data['username'], SELF::ADMIN_USERS)) {
            $data['type'] = User::ADMIN;
        
        } else {
            $data['type'] = User::NORMAL;
        }

        if ($user) {
            $user->update($data);
        } else {
            $user = User::create($data);
        }

        return $user;
    }
}
