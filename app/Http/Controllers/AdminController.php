<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Discipline;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'clubs' => Club::count(),
            'disciplines' => Discipline::count(),
            'competitions' => Competition::count(),
            'adherents' => Adherent::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
