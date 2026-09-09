<?php
namespace App\Http\Controllers;

use App\Http\Requests\OffreRequest;
use App\Http\Requests\OffreUpdateRequest;
use App\Models\Offre;
use App\Models\Mission;
use App\Events\NewOfferReceived;

use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;

class OffreController extends Controller
{
    use AuthorizesRequests;

    /**
     * Envoyer une offre
     */
    public function store(OffreRequest $request): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        $this->authorize('create', Offre::class);

        $mission = Mission::find($request->id_mission);

        if (!$mission) {
            return redirect()
                ->route('missions.index')
                ->with('error', 'Mission introuvable.');
        }

        // Vérifier qu'une seule offre existe pour
        // ce technicien et cette mission
        $existingOffer = Offre::where('id_mission', $mission->id_mission)
            ->where('id_utilisateur', $user->id)
            ->first();

        if ($existingOffer) {
            return redirect()
                ->route('missions.show', $mission->id_mission)
                ->with(
                    'error',
                    'Vous avez déjà envoyé une offre pour cette mission.'
                );
        }

        $offre = Offre::create([
            'prix' => $request->prix,
            'message' => $request->message,
            'pre_diagnostic' => $request->pre_diagnostic,
            'delai' => $request->delai,
            'statut' => 'en_attente',
            'date_offre' => now(),
            'id_mission' => $mission->id_mission,
            'id_utilisateur' => $user->id,
        ]);

        // Notification entreprise
        event(new NewOfferReceived($offre));

        return redirect()
            ->route('missions.show', $mission->id_mission)
            ->with('status', 'Offre envoyée avec succès.');
    }

    /**
     * Modifier une offre
     */
    public function edit(Offre $offre): View
    {
        $this->authorize('update', $offre);

        return view('offres.edit', compact('offre'));
    }

    /**
     * Enregistrer la modification
     */
    public function update(
        OffreUpdateRequest $request,
        Offre $offre
    ): RedirectResponse {
        $this->authorize('update', $offre);

        $offre->update($request->validated());

        return redirect()
            ->route('missions.show', $offre->mission->id_mission)
            ->with('status', 'Offre modifiée avec succès.');
    }

    /**
     * Annuler une offre
     */
    public function destroy(Offre $offre): RedirectResponse
    {
        $this->authorize('delete', $offre);

        $missionId = $offre->id_mission;

        $offre->delete();

        return redirect()
            ->route('missions.show', $missionId)
            ->with('status', 'Offre annulée avec succès.');
    }

    /**
     * Accepter une offre
     */
    public function accept(Offre $offre): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->authorize('accept', $offre);

        $offre->update([
            'statut' => 'acceptee',
        ]);

        return redirect()
            ->route('missions.show', $offre->mission->id_mission)
            ->with('status', 'Offre acceptée avec succès.');
    }

    /**
     * Refuser une offre
     */
    public function refuse(Offre $offre): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->authorize('refuse', $offre);

        $offre->update([
            'statut' => 'refusee',
        ]);

        return redirect()
            ->route('missions.show', $offre->mission->id_mission)
            ->with('status', 'Offre refusée avec succès.');
    }
}

