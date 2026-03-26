<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Discipline;
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

    public function show(Request $request, int $id)
    {
        $competition = $this->competitionWithClubQuery()
            ->where('COMPETITION.COM_ID', $id)
            ->firstOrFail();

        $isAlreadyRegistered = false;
        if ($request->session()->has('auth_adherent_id')) {
            $isAlreadyRegistered = Inscription::query()
                ->where('ADH_ID', (int) $request->session()->get('auth_adherent_id'))
                ->where('COM_ID', $id)
                ->exists();
        }

        return view('competitions.show', compact('competition', 'isAlreadyRegistered'));
    }

    public function adminIndex(Request $request)
    {
        $clubId = $this->adminClubId($request);

        $competitions = Competition::query()
            ->leftJoin('CLUB as club_local', 'COMPETITION.CLU_ID_LOCAL', '=', 'club_local.CLU_ID')
            ->leftJoin('DISCIPLINE', 'COMPETITION.DIS_ID', '=', 'DISCIPLINE.DIS_ID')
            ->select(
                'COMPETITION.*',
                'club_local.CLU_NOM as club_local_nom',
                'DISCIPLINE.DIS_NOM as discipline_nom'
            )
            ->where('COMPETITION.CLU_ID', $clubId)
            ->orderBy('COMPETITION.COM_DATE')
            ->get();

        return view('admin.competitions.index', compact('competitions'));
    }

    public function adminCreate()
    {
        $disciplines = Discipline::query()->orderBy('DIS_NOM')->get();
        $clubs = Club::query()->orderBy('CLU_NOM')->get();

        return view('admin.competitions.create', compact('disciplines', 'clubs'));
    }

    public function adminStore(Request $request)
    {
        $clubId = $this->adminClubId($request);

        $data = $request->validate([
            'COM_ID' => 'required|integer|unique:COMPETITION,COM_ID',
            'DIS_ID' => 'required|integer',
            'CLU_ID_LOCAL' => 'required|integer',
            'COM_NOM' => 'required|string|max:100',
            'COM_DATE' => 'required|date',
        ]);

        $data['CLU_ID'] = $clubId;

        Competition::create($data);

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition ajoutee avec succes.');
    }

    public function adminEdit(Request $request, int $id)
    {
        $clubId = $this->adminClubId($request);

        $competition = Competition::query()
            ->where('COM_ID', $id)
            ->where('CLU_ID', $clubId)
            ->firstOrFail();

        $disciplines = Discipline::query()->orderBy('DIS_NOM')->get();
        $clubs = Club::query()->orderBy('CLU_NOM')->get();

        return view('admin.competitions.edit', compact('competition', 'disciplines', 'clubs'));
    }

    public function adminUpdate(Request $request, int $id)
    {
        $clubId = $this->adminClubId($request);

        $competition = Competition::query()
            ->where('COM_ID', $id)
            ->where('CLU_ID', $clubId)
            ->firstOrFail();

        $data = $request->validate([
            'DIS_ID' => 'required|integer',
            'CLU_ID_LOCAL' => 'required|integer',
            'COM_NOM' => 'required|string|max:100',
            'COM_DATE' => 'required|date',
        ]);

        $competition->update($data);

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition modifiee avec succes.');
    }

    public function adminDestroy(Request $request, int $id)
    {
        $clubId = $this->adminClubId($request);

        $competition = Competition::query()
            ->where('COM_ID', $id)
            ->where('CLU_ID', $clubId)
            ->firstOrFail();

        $competition->delete();

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition supprimee avec succes.');
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

    private function adminClubId(Request $request): int
    {
        $adherentId = (int) $request->session()->get('auth_adherent_id');

        return (int) Adherent::query()
            ->where('ADH_ID', $adherentId)
            ->value('CLU_ID');
    }
}
