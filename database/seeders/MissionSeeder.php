<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\User;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    public function run(): void
    {
        $entreprises = User::where('role', 'Entreprise')->get();

        $missions = [
            ['titre' => 'Maintenance préventive d’une ligne de production', 'description' => 'Nous recherchons un technicien pour effectuer la maintenance préventive d’une ligne de production industrielle et contrôler les différents équipements.', 'localisation' => 'Casablanca', 'budget' => 4500, 'priorite' => 'Haute', 'statut' => 'Publiée'],
            ['titre' => 'Diagnostic d’une panne électrique industrielle', 'description' => 'Intervention pour identifier et réparer une panne électrique sur une installation industrielle.', 'localisation' => 'Béni Mellal', 'budget' => 2800, 'priorite' => 'Haute', 'statut' => 'En cours'],
            ['titre' => 'Maintenance d’un système hydraulique', 'description' => 'Intervention de maintenance corrective sur un système hydraulique industriel.', 'localisation' => 'Marrakech', 'budget' => 3600, 'priorite' => 'Moyenne', 'statut' => 'Publiée'],
            ['titre' => 'Intervention sur une armoire électrique', 'description' => 'Contrôle, diagnostic et remise en état d’une armoire électrique industrielle.', 'localisation' => 'Rabat', 'budget' => 2200, 'priorite' => 'Haute', 'statut' => 'Terminée'],
            ['titre' => 'Maintenance d’une machine de production', 'description' => 'Maintenance préventive et corrective d’une machine utilisée dans une chaîne de production.', 'localisation' => 'Tanger', 'budget' => 5200, 'priorite' => 'Moyenne', 'statut' => 'Affectée'],
        ];

        foreach ($missions as $index => $donnees) {
            Mission::create($donnees + [
                'date_publication' => now()->subDays(10 - $index)->format('Y-m-d H:i:s'),
                'date_limite' => now()->addDays(15 + $index)->format('Y-m-d H:i:s'),
                'id_utilisateur' => $entreprises[$index % $entreprises->count()]->id,
            ]);
        }
    }
}