<?php

namespace App\Http\Middleware;

use App\Auth\CredentialManager;
use Closure;

class PracticeJwtPassport
{
    private CredentialManager $credentialManager;

    public function __construct(CredentialManager $credentialManager)
    {
        $this->credentialManager = $credentialManager;       
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Se o token não for válido, o método abaixo levanta uma exceção.
        try {
            $this->credentialManager->checkPassportThenLocalyAuthenticate($request->bearerToken());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        return $next($request);
    }
}
