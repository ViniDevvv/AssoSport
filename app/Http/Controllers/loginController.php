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
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $adherent = Adherent::where('ADH_EMAIL', $credentials['email'])->first();

        if (!$adherent || !$this->passwordMatches($credentials['password'], $adherent)) {
            return back()->withErrors([
                'email' => 'Identifiants invalides.',
            ])->withInput();
        }

        $request->session()->regenerate();
        $request->session()->put('auth_adherent_id', $adherent->ADH_ID);
        $request->session()->put('auth_adherent_nom', trim(($adherent->ADH_PRENOM ?? '') . ' ' . ($adherent->ADH_NOM ?? '')));

        return redirect()->route('adherents.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['auth_adherent_id', 'auth_adherent_nom']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Vous etes deconnecte.');
    }

    private function passwordMatches(string $plainPassword, Adherent $adherent): bool
    {
        if (!empty($adherent->ADH_HASH_PWD) && Hash::check($plainPassword, $adherent->ADH_HASH_PWD)) {
            return true;
        }

        if (!empty($adherent->ADH_PASSWORD) && Hash::check($plainPassword, $adherent->ADH_PASSWORD)) {
            return true;
        }

        if (!empty($adherent->ADH_PASSWORD) && hash_equals((string) $adherent->ADH_PASSWORD, $plainPassword)) {
            return true;
        }

        return false;
    }
}
