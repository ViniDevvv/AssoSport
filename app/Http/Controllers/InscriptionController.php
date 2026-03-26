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

    public function adminRequests(Request $request)
    {
        $inscriptions = DB::table('INSCRIPTION')
            ->join('COMPETITION', 'INSCRIPTION.COM_ID', '=', 'COMPETITION.COM_ID')
            ->join('ADHERENT', 'INSCRIPTION.ADH_ID', '=', 'ADHERENT.ADH_ID')
            ->where('INSCRIPTION.INS_ETAT', 0)
            ->select(
                'INSCRIPTION.INS_NUM',
                'INSCRIPTION.INS_DATE',
                'INSCRIPTION.INS_ETAT',
                'COMPETITION.COM_ID',
                'COMPETITION.COM_NOM',
                'COMPETITION.COM_DATE',
                'ADHERENT.ADH_ID',
                'ADHERENT.ADH_NOM',
                'ADHERENT.ADH_PRENOM'
            )
            ->orderByDesc('INSCRIPTION.INS_NUM')
            ->get();

        return view('admin.inscriptions.requests', compact('inscriptions'));
    }

    public function adminValidated(Request $request)
    {
        $inscriptions = DB::table('INSCRIPTION')
            ->join('COMPETITION', 'INSCRIPTION.COM_ID', '=', 'COMPETITION.COM_ID')
            ->join('ADHERENT', 'INSCRIPTION.ADH_ID', '=', 'ADHERENT.ADH_ID')
            ->where('INSCRIPTION.INS_ETAT', 1)
            ->select(
                'INSCRIPTION.INS_NUM',
                'INSCRIPTION.INS_DATE',
                'COMPETITION.COM_ID',
                'COMPETITION.COM_NOM',
                'COMPETITION.COM_DATE',
                'ADHERENT.ADH_ID',
                'ADHERENT.ADH_NOM',
                'ADHERENT.ADH_PRENOM'
            )
            ->orderByDesc('INSCRIPTION.INS_NUM')
            ->get();

        return view('admin.inscriptions.validated', compact('inscriptions'));
    }

    public function adminSetStatus(Request $request, int $inscriptionId)
    {
        $status = (int) $request->validate([
            'status' => 'required|integer|in:1,2',
        ])['status'];

        $inscription = DB::table('INSCRIPTION')
            ->where('INSCRIPTION.INS_NUM', $inscriptionId)
            ->select('INSCRIPTION.INS_NUM')
            ->first();

        if (!$inscription) {
            abort(404);
        }

        Inscription::query()
            ->where('INS_NUM', $inscriptionId)
            ->update(['INS_ETAT' => $status]);

        return redirect()->route('admin.inscriptions.requests')
            ->with('success', $status === 1 ? 'Inscription validee.' : 'Inscription refusee.');
    }
}
