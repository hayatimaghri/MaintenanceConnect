<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    public function run(): void
    {
        $techniciens = User::where('role', 'Technicien')->get();
        $missions = Mission::all();

        foreach ($missions as $mission) {
            foreach ($techniciens->take(3) as $index => $technicien) {
                Offre::create([
                    'prix' => 1800 + ($index * 350),
                    'message' => [
                        'Je suis disponible pour intervenir sur cette mission. Je possède une expérience en maintenance industrielle et en diagnostic de pannes.',
                        'Je peux intervenir rapidement et réaliser le diagnostic complet de l’installation.',
                        'Mon expérience en électromécanique me permet de réaliser cette intervention dans les délais demandés.',
                    ][$index],
                    'pre_diagnostic' => 'Après analyse de la description, la panne pourrait être liée à un défaut d’alimentation électrique ou à un composant de commande.',
                    'delai' => 2 + $index,
                    'statut' => $index === 0 && $mission->statut === 'Terminée' ? 'acceptée' : 'en attente',
                    'date_offre' => now()->subDays(3 - $index)->format('Y-m-d H:i:s'),
                    'id_mission' => $mission->id_mission,
                    'id_utilisateur' => $technicien->id,
                ]);
            }
        }
    }
}