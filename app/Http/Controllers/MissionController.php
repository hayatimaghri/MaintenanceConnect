<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Models\Mission;
use App\Events\NewOfferReceived;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

class MissionController extends Controller
{
   public function index(): View
    {
        Gate::authorize('viewAny', Mission::class);

        $search = request('search');
        $priority = request('priorite');
        $status = request('statut');

        $missions = Mission::with('user')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('titre', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('localisation', 'like', "%{$search}%");
                });
            })
            ->when($priority, fn ($query, $priority) => $query->where('priorite', $priority))
            ->when($status, fn ($query, $status) => $query->where('statut', $status))
            ->latest()
            ->get();

        return view('missions.index', compact('missions', 'search', 'priority', 'status'));
    }

    public function create(): View|RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        Gate::authorize('create', Mission::class);

        return view('missions.create');
    }

    public function store(MissionRequest $request): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        Gate::authorize('create', Mission::class);

        Mission::create([
            'localisation' => $request->localisation,
            'titre' => $request->titre,
            'description' => $request->description,
            'budget' => $request->budget,
            'priorite' => $request->priorite,
            'statut' => 'Publiée',
            'date_publication' => $request->date_publication,
            'date_limite' => $request->date_limite,
            'id_utilisateur' => $user->id,
        ]);

        return redirect()->route('missions.index')->with('status', 'Mission published');
    }

    public function show(Mission $mission): View
    {
        Gate::authorize('view', $mission);

        $mission->load(['user', 'offres.user', 'evaluation']);

        return view('missions.show', compact('mission'));
    }

    public function update(MissionRequest $request, Mission $mission): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        Gate::authorize('update', $mission);

       $mission->update($request->only([
    'localisation',
    'titre',
    'description',
    'budget',
    'priorite',
    'date_publication',
    'date_limite'
]));

        return redirect()->route('missions.show', $mission->id_mission)->with('status', 'Mission updated');
    }

// modification de status//
    public function updateStatus(Mission $mission, string $status): RedirectResponse
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    Gate::authorize('update', $mission);

    $allowedTransitions = [
        'Affectée' => ['En cours', 'Annulée'],
        'En cours' => ['Terminée', 'Annulée'],
    ];

    $currentStatus = $mission->statut;

    if (!isset($allowedTransitions[$currentStatus])) {
        return back()->with('error', 'Cette mission ne peut pas changer de statut.');
    }

    if (!in_array($status, $allowedTransitions[$currentStatus], true)) {
        return back()->with('error', 'Transition de statut non autorisée.');
    }

    $mission->update([
        'statut' => $status,
    ]);

    return back()->with('status', "Statut de la mission mis à jour : {$status}.");
}

    public function destroy(Mission $mission): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        Gate::authorize('delete', $mission);

        $mission->delete();

        return redirect()->route('missions.index')->with('status', 'Mission cancelled');
    }
}