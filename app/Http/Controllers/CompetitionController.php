<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Discipline;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eager load discipline relationship for listing
        $competitions = Competition::with('discipline')->orderBy('COM_NOM')->get();
        return view('competitions.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $disciplines = Discipline::orderBy('DIS_NOM')->get();
        return view('competitions.create', compact('disciplines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'COM_ID' => 'required|string|max:10|unique:COMPETITION,COM_ID',
            'COM_NOM' => 'required|string|max:50',
            'COM_DATE' => 'nullable|date',
            'DIS_ID' => 'required|string|max:10|exists:DISCIPLINE,DIS_ID',
        ]);

        Competition::create($data);

        return redirect()->route('competitions.index')
                         ->with('success', 'Competition créée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        $disciplines = Discipline::orderBy('DIS_NOM')->get();
        return view('competitions.edit', compact('competition', 'disciplines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        $data = $request->validate([
            'COM_NOM' => 'required|string|max:50',
            'DIS_ID' => 'required|string|max:10|exists:DISCIPLINE,DIS_ID',
            'COM_DATE' => 'nullable|date',
        ]);

        if (isset($data['COM_DATE']) && $data['COM_DATE'] === '') {
            $data['COM_DATE'] = null;
        }

        if (isset($data['DIS_ID']) && $data['DIS_ID'] === '') {
            $data['DIS_ID'] = null;
        }

        $competition->update($data);

        return redirect()->route('competitions.index')
                         ->with('success', 'Competition mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('competitions.index')
                         ->with('success', 'Competition supprimée.');
    }
}
