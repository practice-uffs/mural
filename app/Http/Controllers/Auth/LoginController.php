<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use phpDocumentor\Reflection\PseudoTypes\True_;

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
        if(getenv('APP_ENV') != 'local'){ //verifica se está rodando no servidor
            $path = redirect()->intended()->getTargetUrl(); //pega a url que usuário estava tentando acessar antes do login
            preg_match('/(practice.uffs.edu.br\/mural)/', $path, $matches, PREG_OFFSET_CAPTURE); //verifica se o link está correto
            if(!$matches){
                $path = preg_replace("/(edu.br\/)/", "$1mural/", $path); //insere o /mural caso necessário
            }
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
