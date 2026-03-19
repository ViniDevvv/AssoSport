<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{
    public function store(Request $request, int $id)
    {
        $adherentId = (int) $request->session()->get('auth_adherent_id');

        $alreadyExists = Inscription::query()
            ->where('ADH_ID', $adherentId)
            ->where('COM_ID', $id)
            ->exists();

        if ($alreadyExists) {
            return redirect()->route('competitions.show', $id)
                ->with('success', 'Vous etes deja inscrit a cette competition.');
        }

        Inscription::create([
            'ADH_ID' => $adherentId,
            'COM_ID' => $id,
            'INS_DATE' => now()->toDateString(),
            'INS_ETAT' => 0,
        ]);

        return redirect()->route('inscriptions.index')
            ->with('success', 'Demande d\'inscription envoyee.');
    }

    public function index(Request $request)
    {
        $adherentId = (int) $request->session()->get('auth_adherent_id');

        $inscriptions = DB::table('INSCRIPTION')
            ->join('COMPETITION', 'INSCRIPTION.COM_ID', '=', 'COMPETITION.COM_ID')
            ->select(
                'INSCRIPTION.INS_NUM',
                'INSCRIPTION.INS_DATE',
                'INSCRIPTION.INS_ETAT',
                'COMPETITION.COM_ID',
                'COMPETITION.COM_NOM',
                'COMPETITION.COM_DATE'
            )
            ->where('INSCRIPTION.ADH_ID', $adherentId)
            ->orderByDesc('INSCRIPTION.INS_NUM')
            ->get();

        return view('inscriptions.index', compact('inscriptions'));
    }
}
