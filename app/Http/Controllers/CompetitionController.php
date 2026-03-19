<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = $this->competitionWithClubQuery()
            ->orderBy('COM_DATE')
            ->get();

        return view('competitions.index', compact('competitions'));
    }

    public function show(Request $request, string $id)
    {
        $competition = $this->competitionWithClubQuery()
            ->where('COMPETITION.COM_ID', $id)
            ->firstOrFail();

        $isAlreadyRegistered = false;
        if ($request->session()->has('auth_adherent_id')) {
            $isAlreadyRegistered = Inscription::query()
                ->where('ADH_ID', (int) $request->session()->get('auth_adherent_id'))
                ->where('COM_ID', (int) $id)
                ->exists();
        }

        return view('competitions.show', compact('competition', 'isAlreadyRegistered'));
    }

    private function competitionWithClubQuery(): Builder
    {
        return Competition::query()
            ->leftJoin('CLUB as club_org', 'COMPETITION.CLU_ID', '=', 'club_org.CLU_ID')
            ->leftJoin('CLUB as club_local', 'COMPETITION.CLU_ID_LOCAL', '=', 'club_local.CLU_ID')
            ->select(
                'COMPETITION.*',
                'club_org.CLU_NOM as club_organisateur_nom',
                'club_local.CLU_NOM as club_local_nom'
            );
    }
}
