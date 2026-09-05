<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'localisation' => fake()->randomElement([
                'Casablanca',
                'Béni Mellal',
                'Marrakech',
                'Rabat',
                'Tanger',
            ]),
            'titre' => fake()->randomElement([
                'Maintenance préventive d’une ligne de production',
                'Diagnostic d’une panne électrique industrielle',
                'Maintenance d’un système hydraulique',
                'Intervention sur une armoire électrique',
                'Maintenance d’une machine de production',
            ]),
            'description' => fake()->randomElement([
                'Nous recherchons un technicien pour effectuer la maintenance préventive d’une ligne de production industrielle et contrôler les différents équipements.',
                'Intervention pour identifier et réparer une panne électrique sur une installation industrielle.',
                'Intervention de maintenance corrective sur un système hydraulique industriel.',
                'Contrôle, diagnostic et remise en état d’une armoire électrique industrielle.',
                'Maintenance préventive et corrective d’une machine utilisée dans une chaîne de production.',
            ]),
            'budget' => fake()->randomFloat(2, 1200, 12000),
            'priorite' => fake()->randomElement([
                'Faible',
                'Moyenne',
                'Haute',
            ]),
            'statut' => 'ouverte',
            'date_publication' => fake()->dateTimeBetween('-30 days', 'now')->format('Y-m-d H:i:s'),
            'date_limite' => fake()->dateTimeBetween('+7 days', '+45 days')->format('Y-m-d H:i:s'),
            'id_utilisateur' => null,
        ];
    }
}