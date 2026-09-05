<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'poste' => fake()->randomElement([
                'Technicien de maintenance industrielle',
                'Technicien électromécanicien',
                'Technicien en automatisme industriel',
                'Technicien électricien industriel',
            ]),
            'entreprise' => fake()->randomElement([
                'Atlas Industrie',
                'Maroc Maintenance Services',
                'TechnoMeca Industrie',
                'Maghreb Équipements',
            ]),
            'date_debut' => fake()->dateTimeBetween('-6 years', '-2 years')->format('Y-m-d'),
            'date_fin' => fake()->dateTimeBetween('-18 months', '-2 months')->format('Y-m-d'),
            'description' => fake()->randomElement([
                'Maintenance préventive et corrective des équipements industriels. Diagnostic des pannes électriques et mécaniques.',
                'Intervention sur les systèmes électromécaniques et réalisation des opérations de maintenance préventive.',
                'Contrôle des installations, recherche de pannes et remise en service des équipements de production.',
            ]),
            'id_utilisateur' => null,
        ];
    }
}