<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Mission;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        if ($user->role === 'Admin') {
            return view('dashboard', [
                'admin' => $user,
                'nombreUtilisateurs' => User::count(),
                'nombreEntreprises' => User::where('role', 'Entreprise')->count(),
                'nombreTechniciens' => User::where('role', 'Technicien')->count(),
                'nombreMissions' => Mission::count(),
                'nombreOffres' => Offre::count(),
                'nombreEvaluations' => Evaluation::count(),
                'dernieresMissions' => Mission::latest()->take(5)->get(),
                'dernieresOffres' => Offre::with(['mission', 'user'])->latest()->take(5)->get(),
            ]);
        }

        if ($user->role === 'Entreprise') {
            $missions = $user->missions()->withCount('offres')->latest()->get();

            return view('dashboard', [
                'user' => $user,
                'missions' => $missions,
                'nombreMissions' => $missions->count(),
                'nombreOffres' => $missions->sum('offres_count'),
                'missionsActives' => $missions->whereNotIn('statut', ['Terminée', 'Annulée'])->count(),
            ]);
        }

        $offres = $user->offres()->with('mission')->latest()->get();

        return view('dashboard', [
            'user' => $user,
            'offres' => $offres,
            'nombreOffres' => $offres->count(),
            'nombreMissions' => Mission::whereNotIn('statut', ['Terminée', 'Annulée'])->count(),
            'nombreCompetences' => $user->competences()->count(),
            'nombreExperiences' => $user->experiences()->count(),
        ]);
    }
}
