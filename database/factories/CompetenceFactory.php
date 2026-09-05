<?php

namespace Database\Factories;

use App\Models\Competence;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenceFactory extends Factory
{
    protected $model = Competence::class;

    public function definition(): array
    {
        $competences = [
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

        return [
            'nom' => fake()->unique()->randomElement($competences),
            'description' => fake()->randomElement([
                'Intervention et suivi des équipements industriels.',
                'Diagnostic, réglage et remise en service des installations.',
                'Compétence appliquée aux opérations de maintenance préventive et corrective.',
            ]),
        ];
    }
}