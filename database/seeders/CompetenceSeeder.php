<?php



namespace Database\Seeders;

use App\Models\User;
use App\Models\Competence;
use Illuminate\Database\Seeder;

class CompetenceSeeder extends Seeder
{
    public function run(): void
    {
        $noms = [
            'Maintenance industrielle',
            'Électricité industrielle',
            'Électromécanique',
            'Automatisme industriel',
            'Hydraulique',
            'Pneumatique',
            'Mécanique industrielle',
            'Maintenance préventive',
            'Maintenance corrective',
            'Diagnostic de pannes',
            'Automates programmables',
            'Instrumentation industrielle',
        ];

        $competences = collect($noms)->map(fn (string $nom) => Competence::create([
            'nom' => $nom,
            'description' => 'Compétence utilisée pour les interventions de maintenance industrielle.',
        ]));

        $techniciens = User::where('role', 'Technicien')->get();

        foreach ($techniciens as $technicien) {
            $technicien->competences()->attach($competences->random(4)->pluck('id_competence'));
        }
    }
}