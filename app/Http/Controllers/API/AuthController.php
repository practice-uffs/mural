<?php

namespace App\Http\Controllers\API;

use App\User;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
        /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Confere se esse usuário existe na base idUFFS
        $credentials_uffs = [
            'user'     => strtolower($request->input('username')),
            'password' => $request->input('password'),
        ];
        $auth = new \CCUFFS\Auth\AuthIdUFFS();
        $userData = $auth->login($credentials_uffs);
        
        if (!$userData) {
            return response()->json(['error' => 'usuário ou senha incorreta'], 401);
        }else{
            //Gera o token e realiza o Login do usuário
            $credentials = [
                'username' => $userData->username,
                'password' => $userData->pessoa_id,
            ];
            if (! $token = auth('api')->attempt($credentials)) {
                
                $userData->password = bcrypt($credentials['password']);
                // Caso usuário exista na base idUFFS, ele criará o usuário no webfeedback
                $user = $this->getOrCreateUser($userData);
                // e tentará gerar o token e fazer login novamente
                if (! $token = auth('api')->attempt($credentials)) {
                    return response()->json(['error' => 'não autorizado'], 401);
                }
                return $this->respondWithToken($token);
            }
            return $this->respondWithToken($token);
        }
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    
    public function isTokenValid(Request $request){
        $token = $request['token'];

        $tokenParts = explode('.', $token);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signatureProvided = $tokenParts[2];

        $expiration = Carbon::createFromTimestamp(json_decode($payload)->exp);
        $tokenExpired = (Carbon::now()->diffInSeconds($expiration, false) > 0);

        return response()->json(['valid'=> $tokenExpired]);
    }
        /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 * 24 * 60 // minutos * horas * dias = 2 meses
        ]);
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
