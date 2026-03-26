<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('Login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string'],
        ]);

        $adherent = Adherent::query()
            ->where('ADH_EMAIL', $credentials['login'])
            ->orWhere('ADH_ID', $credentials['login'])
            ->orWhere('ADH_NOM', $credentials['login'])
            ->first();

        if (!$adherent || !$this->passwordMatches($credentials['password'], $adherent)) {
            return back()->withErrors([
                'login' => 'Identifiants invalides.',
            ])->withInput();
        }

        $request->session()->regenerate();
        $request->session()->put('auth_adherent_id', $adherent->ADH_ID);
        $request->session()->put('auth_adherent_nom', trim(($adherent->ADH_PRENOM ?? '') . ' ' . ($adherent->ADH_NOM ?? '')));
        $request->session()->put('auth_adherent_role', (int) ($adherent->ADH_ROLE ?? 0));

        if ((int) ($adherent->ADH_ROLE ?? 0) === 1) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('competitions.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['auth_adherent_id', 'auth_adherent_nom', 'auth_adherent_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Vous etes deconnecte.');
    }

    private function passwordMatches(string $plainPassword, Adherent $adherent): bool
    {
        return !empty($adherent->ADH_HASH_PWD)
            && Hash::check($plainPassword, $adherent->ADH_HASH_PWD);
    }
}
