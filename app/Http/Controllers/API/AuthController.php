<?php

namespace App\Http\Controllers\API;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    const ADMIN_USERS = [
        'jean.hilger',
        'junior.ramisch',
        'raphael.santos'
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
            'user'     => $request->input('username'),
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
            'expires_in' => auth('api')->factory()->getTTL() * 60
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
