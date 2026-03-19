<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::orderBy('DIS_NOM')->get();

        return view('disciplines.index', compact('disciplines'));
    }

    public function create()
    {
        return view('disciplines.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'DIS_ID' => ['required', 'string', 'max:10', 'unique:DISCIPLINE,DIS_ID'],
            'DIS_NOM' => ['required', 'string', 'max:50'],
        ]);

        Discipline::create($data);

        return redirect()->route('disciplines.index')->with('success', 'Discipline creee avec succes.');
    }

    public function edit(string $id)
    {
        $discipline = Discipline::findOrFail($id);

        return view('disciplines.edit', compact('discipline'));
    }

    public function update(Request $request, string $id)
    {
        $discipline = Discipline::findOrFail($id);

        $data = $request->validate([
            'DIS_ID' => ['required', 'string', 'max:10', 'unique:DISCIPLINE,DIS_ID,' . $discipline->DIS_ID . ',DIS_ID'],
            'DIS_NOM' => ['required', 'string', 'max:50'],
        ]);

        $discipline->update($data);

        return redirect()->route('disciplines.index')->with('success', 'Discipline modifiee avec succes.');
    }

    public function destroy(string $id)
    {
        $discipline = Discipline::findOrFail($id);
        $discipline->delete();

        return redirect()->route('disciplines.index')->with('success', 'Discipline supprimee avec succes.');
    }
}
