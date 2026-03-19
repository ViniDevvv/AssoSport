<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplines = Discipline::orderBy('DIS_NOM')->get();
        return view('disciplines.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disciplines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            //'DIS_ID' => 'required|string|max:10|unique:DISCIPLINE,DIS_ID',
            'DIS_NOM' => 'required|string|max:50',
        ]);

        Discipline::create($data);

        return redirect()->route('disciplines.index')
                         ->with('success', 'Discipline créée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discipline $discipline)
    {
        return view('disciplines.edit', compact('discipline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discipline $discipline)
    {
        $data = $request->validate([
            'DIS_NOM' => 'required|string|max:50'
            //'DIS_ID' => 'required|string|max:10|unique:DISCIPLINE,DIS_ID,' . $discipline->DIS_ID
        ]);

        // DIS_ID is primary key; only DIS_NOM can change
        $discipline->update($data);

        return redirect()->route('disciplines.index')
                         ->with('success', 'Discipline mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discipline $discipline)
    {
        $discipline->delete();

        return redirect()->route('disciplines.index')
                         ->with('success', 'Discipline supprimée.');
    }
}
