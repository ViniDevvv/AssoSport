<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('auth_adherent_id')) {
            return redirect()->route('login.form')->withErrors([
                'auth' => 'Connectez-vous pour acceder a cette page.',
            ]);
        }

        return $next($request);
    }
}
