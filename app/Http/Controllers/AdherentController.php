<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdherentController extends Controller
{
    public function index()
    {
        $adherents = Adherent::paginate(15);
        return view('adherents.index', compact('adherents'));
    }

    public function create()
    {
        return view('adherents.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ADH_ID' => 'required|integer|unique:ADHERENT,ADH_ID',
            'CLU_ID' => 'required|integer',
            'DIS_ID' => 'required|integer',
            'ADH_NOM' => 'required|string|max:50',
            'ADH_PRENOM' => 'required|string|max:25',
            'ADH_EMAIL' => 'required|email|max:100|unique:ADHERENT,ADH_EMAIL',
            'ADH_ROLE' => 'required|integer|in:0,1',
            'ADH_PASSWORD' => 'required|string|min:4|max:100',
            'ADH_DDN' => 'nullable|date',
            'ADH_ADRESSE' => 'nullable|string|max:50',
        ]);

        $data['ADH_HASH_PWD'] = Hash::make($data['ADH_PASSWORD']);
        unset($data['ADH_PASSWORD']);

        Adherent::create($data);

        return redirect()->route('adherents.index')
            ->with('success', 'Adhérent créé.');
    }

    public function edit(Adherent $adherent)
    {
        return view('adherents.edit', compact('adherent'));
    }

    public function update(Request $request, Adherent $adherent)
    {
        $data = $request->validate([
            'ADH_ID' => "required|integer|unique:ADHERENT,ADH_ID,{$adherent->ADH_ID},ADH_ID",
            'CLU_ID' => 'required|integer',
            'DIS_ID' => 'required|integer',
            'ADH_NOM' => 'required|string|max:50',
            'ADH_PRENOM' => 'required|string|max:25',
            'ADH_EMAIL' => "required|email|max:100|unique:ADHERENT,ADH_EMAIL,{$adherent->ADH_ID},ADH_ID",
            'ADH_ROLE' => 'required|integer|in:0,1',
            'ADH_PASSWORD' => 'nullable|string|min:4|max:100',
            'ADH_DDN' => 'nullable|date',
            'ADH_ADRESSE' => 'nullable|string|max:50',
        ]);

        if (!empty($data['ADH_PASSWORD'])) {
            $data['ADH_HASH_PWD'] = Hash::make($data['ADH_PASSWORD']);
        }
        unset($data['ADH_PASSWORD']);

        $adherent->update($data);

        return redirect()->route('adherents.index')
            ->with('success', 'Adhérent modifié.');
    }

    public function destroy(Adherent $adherent)
    {
        $adherent->delete();
        return redirect()->route('adherents.index')
            ->with('success', 'Adhérent supprimé.');
    }
}