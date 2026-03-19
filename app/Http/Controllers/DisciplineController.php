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
        $data = $request->validate($this->disciplineRules());

        Discipline::create($data);

        return redirect()->route('disciplines.index')->with('success', 'Discipline creee avec succes.');
    }

    public function edit(int $id)
    {
        $discipline = Discipline::findOrFail($id);

        return view('disciplines.edit', compact('discipline'));
    }

    public function update(Request $request, int $id)
    {
        $discipline = Discipline::findOrFail($id);

        $data = $request->validate($this->disciplineRules($discipline->DIS_ID));

        $discipline->update($data);

        return redirect()->route('disciplines.index')->with('success', 'Discipline modifiee avec succes.');
    }

    public function destroy(int $id)
    {
        $discipline = Discipline::findOrFail($id);
        $discipline->delete();

        return redirect()->route('disciplines.index')->with('success', 'Discipline supprimee avec succes.');
    }

    private function disciplineRules(?int $currentId = null): array
    {
        $idRules = ['required', 'integer', 'unique:DISCIPLINE,DIS_ID'];

        if ($currentId !== null) {
            $idRules = ['required', 'integer', 'unique:DISCIPLINE,DIS_ID,' . $currentId . ',DIS_ID'];
        }

        return [
            'DIS_ID' => $idRules,
            'DIS_NOM' => ['required', 'string', 'max:50'],
        ];
    }
}
