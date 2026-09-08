<?php

namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Models\Offre;
use App\Models\Mission;

use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OffreController extends Controller
{
        use AuthorizesRequests;
    public function store(OffreRequest $request): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();


        $this->authorize('create', Offre::class);

        $mission = Mission::find($request->id_mission);

        if (! $mission) {
            return redirect()->route('missions.index')->with('error', 'Mission not found.');
        }

        $offre = Offre::create([
            'prix' => $request->prix,
            'message' => $request->message,
            'pre_diagnostic' => $request->pre_diagnostic,
            'delai' => $request->delai,
            'statut' => $request->statut,
            'date_offre' => $request->date_offre,
            'id_mission' => $mission->id_mission,
            'id_utilisateur' => $user->id,
        ]);

        return redirect()->route('missions.show', $mission->id_mission)->with('status', 'Offer submitted');
    }

    public function accept(Offre $offre): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $this->authorize('accept', $offre);

        $offre->statut = 'acceptée';
        $offre->save();

        return redirect()->route('missions.show', $offre->mission->id_mission)->with('status', 'Offer accepted');
    }
}