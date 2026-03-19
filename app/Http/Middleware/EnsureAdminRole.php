<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int) $request->session()->get('auth_adherent_role') !== 1) {
            return redirect()->route('competitions.index')->withErrors([
                'auth' => 'Acces reserve a l\'administrateur.',
            ]);
        }

        return $next($request);
    }
}
