<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Mission;
use App\Http\Requests\EvaluationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;

class EvaluationController extends Controller
{

public function store(EvaluationRequest $request, Mission $mission): RedirectResponse
{
    $user = auth()->user();

    // 1. Vérifier que l'utilisateur est une Entreprise
    if (! $user || $user->role !== 'Entreprise') {
        throw new AuthorizationException('Unauthorized.');
    }

    // 2. Vérifier que la mission appartient à cette Entreprise
    if ($mission->id_utilisateur !== $user->id) {
        throw new AuthorizationException('Unauthorized.');
    }

    // 3. Vérifier que la mission est terminée
    if ($mission->statut !== 'Terminée') {
        throw new AuthorizationException(
            'You can only evaluate a completed mission.'
        );
    }

    // 4. Vérifier qu'une évaluation n'existe pas déjà
    if ($mission->evaluation) {
        return redirect()
            ->route('missions.show', $mission->id_mission)
            ->with('error', 'Cette mission a déjà été évaluée.');
    }

    // 5. Récupérer l'offre acceptée
    $offreAcceptee = $mission->offres()
        ->where('statut', 'acceptee')
        ->first();

    if (! $offreAcceptee) {
        return redirect()
            ->route('missions.show', $mission->id_mission)
            ->with('error', 'Aucun technicien affecté à cette mission.');
    }

    // 6. Validation
    $validated = $request->validated();

    // 7. Créer l'évaluation du technicien
    Evaluation::create([
        'note' => $validated['note'],
        'commentaire' => $validated['commentaire'] ?? null,
        'id_mission' => $mission->id_mission,
        'id_utilisateur' => $offreAcceptee->id_utilisateur,
    ]);

    // 8. Retourner vers la mission
    return redirect()
        ->route('missions.show', $mission->id_mission)
        ->with('status', 'Évaluation enregistrée avec succès.');
}


}