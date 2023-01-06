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

        if (empty(session()->get("_loginAttempts")) && session()->get("_loginAttempts") !== 0){
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
        
        //resolve o problema descrito da falta do "/mural" na url descrito na issue #535 https://github.com/practice-uffs/mural/issues/535
        
        $path = redirect()->intended()->getTargetUrl();
        
        $size = strlen($path);

        if($size>=29){
        
            $initial = substr($path,0,29);
            $mid = substr($path,29,35);
            $end = substr($path,29,$size);
            
            if($initial=="https://practice.uffs.edu.br/")
                if($initial.$mid!="https://practice.uffs.edu.br/mural/")
                    $path = "https://practice.uffs.edu.br/mural/{$end}";
                    
        }
        
        return redirect()->to($path);
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
}
