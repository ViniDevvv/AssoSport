<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'ADH_ID' => 'nullable|string|max:15|unique:ADHERENT,ADH_ID',
            'CLU_ID' => 'required|string|max:15',
            'DIS_ID' => 'required|string|max:10',
            'ADH_NOM' => 'required|string|max:50',
            'ADH_PRENOM' => 'required|string|max:25',
            'ADH_DDN' => 'nullable|date',
            'ADH_ADRESSE' => 'nullable|string|max:50',
            'ADH_EMAIL' => 'nullable|email|max:50',
            'ADH_PASSWORD' => 'required|string|min:8',
            'ADH_ROLE' => 'required|string|max:20',
            'ADH_HASH_PWD' => 'required|string|max:255',
        ]);

        if (empty($data['ADH_ID'])) {
            $data['ADH_ID'] = Str::uuid()->toString();
        }

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
            'ADH_ID' => "required|string|max:15|unique:ADHERENT,ADH_ID,{$adherent->ADH_ID},ADH_ID",
            'CLU_ID' => 'required|string|max:15',
            'DIS_ID' => 'required|string|max:10',
            'ADH_NOM' => 'required|string|max:50',
            'ADH_PRENOM' => 'required|string|max:25',
            'ADH_DDN' => 'nullable|date',
            'ADH_ADRESSE' => 'nullable|string|max:50',
        ]);

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
