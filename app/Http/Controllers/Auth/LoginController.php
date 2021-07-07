<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    const ADMIN_USERS = [
        'alessandra.pedrotti',
        'alisson.peloso',
        'ana.silveira',
        'andrew.silva',
        'amanda.bisognin',
        'brenda.reis',
        'cleisson.raimundi',
        'estela.boas',
        'gessicazanon',
        'guilherme.graeff',
        'isabeli.reik',
        'jean.hilger',
        'junior.ramisch',
        'lcaimi',
        'luiz.dameda',
        'luiza.tonial',
        'mariaeduarda.santos',
        'matheus.negrao',
        'milena.pastorini',
        'morgana.oliveira',
        'pedro.maximowski',
        'raphael.santos',
        'robison.silva',
        'stefani.meneghetti',
        'taynara.christmann',
        'thalia.friedrich',
        'vinicius.alves',
        'vinicius.reis',
    ];

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
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
            return redirect()
            ->route('login')
            ->withErrors([
                'credential' => 'Login ou Senha inválidos, por favor verifique os dados e tente novamente.'
                ]);
        }else{                
            $credentials = [
                'username' => $userData->username,
                'password' => $userData->pessoa_id,
            ];
            if (! $token = auth('api')->attempt($credentials)) {

                $userData->password = bcrypt($userData->pessoa_id);
                $user = $this->getOrCreateUser($userData);

                if (! $token = auth('api')->attempt($credentials)) {
                    return redirect()->route('login')
                    ->withErrors(['credential' => 'Usuário não autorizado']);
                }
                $token = $this->respondWithToken($token);
                Session::put('token',$token);
                Auth::login($user);
                return view('index')->with('token',Session::get('token'));
            }
            $userData->password = bcrypt($userData->pessoa_id);
            $user = $this->getOrCreateUser($userData);
            $token = $this->respondWithToken($token);
            Session::put('token',$token);
            Auth::login($user);
            return view('index')->with('token',Session::get('token'));
        }
    }


    protected function respondWithToken($token)
    {
        return json_encode([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 * 24 * 60 // minutos * horas * dias = 2 meses
        ]);
    }

    public function logout(Request $resquest)
    {
        Session::forget('token');
        Auth::logout();
        return redirect()->intended('login');
    }

    public function refresh()
    {
        $token = $this->respondWithToken(auth('api')->refresh());
        return view('index')->with('token',Session::get('token'));
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
