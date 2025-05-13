<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Groupe;
use App\Models\Sceance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminsCount = User::where('role', 'admin')->count();
        $enseignantsCount = User::where('role', 'enseignant')->count();
        $elevesCount = User::where('role', 'eleve')->count();
        $groupesCount = Groupe::count();
        $totalSeances = Sceance::count();
        $totalAbsences = Absence::count();

        $tauxAbsence = $totalSeances > 0
            ? number_format(($totalAbsences / ($totalSeances * $elevesCount)) * 100, 2)
            : 0;

        return view('admin.dashboard', compact(
            'adminsCount',
            'enseignantsCount',
            'elevesCount',
            'groupesCount',
            'tauxAbsence'
        ));
    }

    public function absences()
    {
        // recuperer toutes les absences avec les relations utiles (user, sceance et groupe)
        $absences = Absence::with(['user', 'sceance.groupe'])->get();

        return view('admin.absences', compact('absences'));
    }
}
