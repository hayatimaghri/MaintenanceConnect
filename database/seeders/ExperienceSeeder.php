<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $techniciens = User::where('role', 'Technicien')->get();

        foreach ($techniciens as $technicien) {
            Experience::create([
                'poste' => 'Technicien de maintenance industrielle',
                'entreprise' => 'Atlas Industrie',
                'date_debut' => '2021-01-11',
                'date_fin' => '2023-06-30',
                'description' => 'Maintenance préventive et corrective des équipements industriels. Diagnostic des pannes électriques et mécaniques.',
                'id_utilisateur' => $technicien->id,
            ]);

            Experience::create([
                'poste' => 'Technicien électromécanicien',
                'entreprise' => 'Maroc Maintenance Services',
                'date_debut' => '2023-07-01',
                'date_fin' => null,
                'description' => 'Intervention sur les systèmes électromécaniques et réalisation des opérations de maintenance préventive.',
                'id_utilisateur' => $technicien->id,
            ]);
        }
    }
}