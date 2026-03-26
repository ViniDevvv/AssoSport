<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNonAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int) $request->session()->get('auth_adherent_role') === 1) {
            return redirect()->route('admin.dashboard')->withErrors([
                'auth' => 'Cette fonctionnalite est reservee aux adherents.',
            ]);
        }

        return $next($request);
    }
}
