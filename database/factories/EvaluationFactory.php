<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'note' => fake()->numberBetween(4, 5),
            'commentaire' => fake()->randomElement([
                'Très bonne intervention. Le technicien a réalisé le travail rapidement et avec professionnalisme.',
                'Intervention efficace et technicien sérieux. Le diagnostic a été réalisé correctement.',
                'Mission réalisée dans les délais avec un compte rendu clair et complet.',
            ]),
            'id_mission' => null,
            'id_utilisateur' => null,
        ];
    }
}