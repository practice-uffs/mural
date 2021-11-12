<?php

namespace App\Auth;

use App\Models\App;
use App\Models\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Disponibiliza conferência de credenciais que utilizara u app_id e JWT para
 * identificação entre sistemas.
 */
class CredentialManager
{
    /**
     * 
     * @License: using code from https://github.com/firebase/php-jwt/blob/master/src/JWT.php
     */
    public function parseJwt($jwt) {
        $parts = explode('.', $jwt);

        if (count($parts) != 3) {
            throw new \Exception('Wrong number of segments in JWT');
        }
        
        list($headb64, $bodyb64, $cryptob64) = $parts;

        $header = json_decode(JWT::urlsafeB64Decode($headb64));
        $payload = json_decode(JWT::urlsafeB64Decode($bodyb64));        
        $sig = json_decode(JWT::urlsafeB64Decode($cryptob64));        

        if ($header === null) {
            throw new \Exception('Invalid header encoding in JWT: ' . $headb64);
        }

        if ($payload === null) {
            throw new \Exception('Invalid claims encoding in JWT: ' . $bodyb64);
        }

        if ($sig === false) {
            throw new \Exception('Invalid signature encoding in JWT: ' . $cryptob64);
        }        

        return [
            'header' => (array) $header,
            'payload' => (array) $payload,
            'sig' => $sig,
        ];
    }

    /**
     * Cria um JWT para identificação entre sistemas.
     * 
     * @param $user array associativo com informações de usuário, por exemplo `['name' => 'Fernando Bevilacqua', 'uid' => 'fernando.bevilacqua']`
     * @param $ttlSeconds tempo, em segundos, que esse token deve durar. Se null for informado, o token será valido para sempre.
     * 
     * @return string JWT que pode ser utilizado como passaporte.
     */
    public function createPassportFromApp(App $app, array $user, $ttlSeconds = null) {
        $key = $app->secret;
        $payload = array(
            'iss' => $app->name,
            'aud' => $app->domain,
            'iat' => Carbon::now()->timestamp,
            'nbf' => Carbon::now()->timestamp,
            'app_id' => $app->id,
            'user' => $user
        );

        if ($ttlSeconds != null) {
            $payload['exp'] = Carbon::now()->addSeconds($ttlSeconds)->timestamp;
        }

        $jwt = JWT::encode($payload, $key);

        return $jwt;
    }

    /**
     * Cria um JWT para identificação/autenticação da aplicação (local) na API practice.
     * 
     * @param $user array associativo com informações de usuário, por exemplo `['name' => 'Fernando Bevilacqua', 'uid' => 'fernando.bevilacqua']`
     * @param $ttlSeconds tempo, em segundos, que esse token deve durar. Se nada for informado, o token tem validade de 60 segundos.
     * 
     * @return string JWT que pode ser utilizado como passaporte.
     */
    public function createPassportFromLocalApp(array $data = [], $ttlSeconds = 60) {
        $key = config('app.key');
        $now = Carbon::now();

        $jwt = JWT::encode([
            'iss' => config('app.name'),
            'aud' => parse_url(config('app.url'))['host'],
            'iat' => $now->timestamp,
            'nbf' => $now->timestamp,
            'exp' => $now->addSeconds($ttlSeconds)->timestamp,
            'app_id' => config('app.id'),
            'data' => $data
        ], $key);

        return $jwt;
    }    

    protected function getJwtKeyFromAppId(int $app_id) {
        $localAppId = config('app.id');

        if ($app_id != $localAppId) {
            throw new \Exception("Informed app_id=$app_id does not match local app_id=$localAppId in practice passport");
        }

        $key = config('app.key');
        return $key;
    }

    /**
     * 
     * @License: using code from https://github.com/firebase/php-jwt/blob/master/src/JWT.php
     */
    public function checkPassport(string $jwt, $key = null) {
        $infos = $this->parseJwt($jwt);
        $payload = $infos['payload'];

        if (!isset($payload['app_id'])) {
            throw new \Exception('Missing app_id in passport payload');
        }

        if ($key == null) {
            $key = $this->getJwtKeyFromAppId($payload['app_id']);
        }

        $decoded = JWT::decode($jwt, $key, array('HS256'));

        return $decoded;
    }

    /**
     * Testa se o token JWT informado é válido.
     */
    public function isValidJwtToken(string $jwt, $key = null) {
        try {
            $this->checkPassport($jwt, $key);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param $jwt string|null JWT a ser utilizado.
     */
    public function checkPassportThenLocalyAuthenticate(mixed $jwt, $key = null) {
        if (empty($jwt)) {
            throw new \Exception('Missing Practice passport (JWT bearer token) in request header');
        }

        // Se o token não for válido, o método abaixo levanta uma exceção.
        $payload = $this->checkPassport($jwt, $key);

        $appId = $payload->app_id;
        $informedUser = (array) $payload->user;
        $user = User::where('uid', $informedUser['uid'])->first();

        if (!$user) {
            $user = $this->createUserFromPassportInfo($informedUser);
        }

        Auth::login($user);
        return $user;
    }

    public function createCredentials(string $passport) {
        if(empty($passport)) {
            return new Credentials(['user' => 'guest']);
        }

        return new Credentials((array)$this->checkPassport($passport));
    }

    public function createUserFromPassportInfo(array $info) {
        $uid = $info['uid'];
        $password = Hash::make($uid . $info['email']);

        $user = User::where(['uid' => $uid])->first();
        $data = [
            'uid' => $uid,
            'email' => $info['email'],
            'name' => $info['name'],
            'password' => $password
        ];

        if($user) {
            $user->update($data);
        } else {
            $user = User::create($data);
        }

        return $user;
    }
}
