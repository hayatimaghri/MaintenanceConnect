<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Models\Mission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;

class MissionController extends Controller
{
   public function index(): View
{
    $missions = Mission::all();

    return view('missions.index', compact('missions'));
}

    public function create(): View
    {
        return view('missions.create');
    }

    public function store(MissionRequest $request): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if ($user->role !== 'Admin' && $user->role !== 'Entreprise') {
            throw new AuthorizationException('Unauthorized.');
        }

        $this->authorize('create', Mission::class);

        Mission::create([
            'localisation' => $request->localisation,
            'titre' => $request->titre,
            'description' => $request->description,
            'budget' => $request->budget,
            'priorite' => $request->priorite,
            'statut' => $request->statut,
            'date_publication' => $request->date_publication,
            'date_limite' => $request->date_limite,
            'id_utilisateur' => $user->id,
        ]);

        return redirect()->route('missions.index')->with('status', 'Mission published');
    }

    public function show(Mission $mission): View
    {
        return view('missions.show', ['mission' => $mission]);
    }

    public function update(MissionRequest $request, Mission $mission): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $this->authorize('update', $mission);

        $mission->update($request->only([
            'localisation', 'titre', 'description', 'budget',
            'priorite', 'statut', 'date_publication', 'date_limite'
        ]));

        return redirect()->route('missions.show', $mission->id_mission)->with('status', 'Mission updated');
    }

    public function destroy(Mission $mission): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $this->authorize('delete', $mission);

        $mission->delete();

        return redirect()->route('missions.index')->with('status', 'Mission cancelled');
    }
}