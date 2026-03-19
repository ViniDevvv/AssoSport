<?php

namespace App\Http\Controllers;

use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::query()
            ->leftJoin('CLUB as club_org', 'COMPETITION.CLU_ID', '=', 'club_org.CLU_ID')
            ->leftJoin('CLUB as club_local', 'COMPETITION.CLU_ID_LOCAL', '=', 'club_local.CLU_ID')
            ->select(
                'COMPETITION.*',
                'club_org.CLU_NOM as club_organisateur_nom',
                'club_local.CLU_NOM as club_local_nom'
            )
            ->orderBy('COM_DATE')
            ->get();

        return view('competitions.index', compact('competitions'));
    }

    public function show(string $id)
    {
        $competition = Competition::query()
            ->leftJoin('CLUB as club_org', 'COMPETITION.CLU_ID', '=', 'club_org.CLU_ID')
            ->leftJoin('CLUB as club_local', 'COMPETITION.CLU_ID_LOCAL', '=', 'club_local.CLU_ID')
            ->select(
                'COMPETITION.*',
                'club_org.CLU_NOM as club_organisateur_nom',
                'club_local.CLU_NOM as club_local_nom'
            )
            ->where('COMPETITION.COM_ID', $id)
            ->firstOrFail();

        return view('competitions.show', compact('competition'));
    }
}
