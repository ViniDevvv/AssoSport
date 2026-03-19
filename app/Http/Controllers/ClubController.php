<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    // Affiche la liste des clubs
    public function index()
    {
        $clubs = Club::orderBy('CLU_NOM')->get();

        return view('clubs.index', compact('clubs'));
    }

    // Affiche le formulaire d'ajout
    public function create()
    {
        return view('clubs.create');
    }

    // Enregistre un nouveau club
    public function store(Request $request)
    {
        $data = $request->validate($this->clubRules());

        Club::create($data);

        return redirect()->route('clubs.index')->with('success', 'Club cree avec succes.');
    }

    // Affiche le formulaire de modification
    public function edit(int $id)
    {
        $club = Club::findOrFail($id);

        return view('clubs.edit', compact('club'));
    }

    // Met a jour un club existant
    public function update(Request $request, int $id)
    {
        $club = Club::findOrFail($id);

        $data = $request->validate($this->clubRules());

        $club->update($data);

        return redirect()->route('clubs.index')->with('success', 'Club modifie avec succes.');
    }

    // Supprime un club
    public function destroy(int $id)
    {
        $club = Club::findOrFail($id);
        $club->delete();

        return redirect()->route('clubs.index')->with('success', 'Club supprime avec succes.');
    }

    private function clubRules(): array
    {
        return [
            'CLU_NOM' => ['required', 'string', 'max:50'],
            'CLU_ADRESSEVILLE' => ['nullable', 'string', 'max:50'],
            'CLU_ADRESSERUE' => ['nullable', 'string', 'max:25'],
            'CLU_ADRESSECP' => ['nullable', 'string', 'max:6'],
            'CLU_MAIL' => ['nullable', 'email', 'max:25'],
            'CLU_TELFIXE' => ['nullable', 'string', 'max:15'],
        ];
    }
}
