<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'prix' => fake()->randomFloat(2, 1200, 8000),
            'message' => fake()->randomElement([
                'Je suis disponible pour intervenir sur cette mission. Je possède une expérience en maintenance industrielle et en diagnostic de pannes.',
                'Je peux intervenir rapidement et réaliser le diagnostic complet de l’installation.',
                'Mon expérience en électromécanique me permet de réaliser cette intervention dans les délais demandés.',
                'Je suis disponible pour effectuer la maintenance préventive et proposer un compte rendu après intervention.',
            ]),
            'pre_diagnostic' => fake()->randomElement([
                'Après analyse de la description, la panne pourrait être liée à un défaut d’alimentation électrique ou à un composant de commande.',
                'Une vérification des organes de sécurité, des connexions et des éléments mécaniques sera réalisée lors du diagnostic.',
                'Le contrôle initial portera sur les circuits de commande, les capteurs et l’état général de l’installation.',
            ]),
            'delai' => fake()->numberBetween(1, 10),
            'statut' => fake()->randomElement([
                'en attente',
                'acceptee',
                'refusee',
            ]),
            'date_offre' => fake()->dateTimeBetween('-15 days', 'now')->format('Y-m-d H:i:s'),
            'id_mission' => null,
            'id_utilisateur' => null,
        ];
    }
}