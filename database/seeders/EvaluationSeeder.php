<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use App\Models\Mission;
use App\Models\Offre;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    public function run(): void
    {
        $missions = Mission::where('statut', 'Terminée')->get();

        foreach ($missions as $mission) {
            $offreAcceptee = Offre::where('id_mission', $mission->id_mission)
                ->where('statut', 'acceptee')
                ->first();

            if (! $offreAcceptee) {
                continue;
            }

            Evaluation::create([
                'note' => 5,
                'commentaire' => 'Très bonne intervention. Le technicien a réalisé le travail rapidement et avec professionnalisme.',
                'id_mission' => $mission->id_mission,
                'id_utilisateur' => $offreAcceptee->id_utilisateur,
            ]);
        }
    }
}