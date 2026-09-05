<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin MaintenanceConnect',
            'email' => 'admin@maintenanceconnect.test',
            'password' => Hash::make('password'),
            'telephone' => '+212 5 22 00 00 01',
            'role' => 'Admin',
        ]);

        $entreprises = [
            ['name' => 'Atlas Industrie', 'email' => 'contact@atlas-industrie.test', 'telephone' => '+212 5 22 10 20 30'],
            ['name' => 'Maroc Maintenance Services', 'email' => 'contact@maroc-maintenance.test', 'telephone' => '+212 5 24 30 40 50'],
            ['name' => 'TechnoMeca Industrie', 'email' => 'contact@technomeca.test', 'telephone' => '+212 5 39 50 60 70'],
            ['name' => 'Maghreb Équipements', 'email' => 'contact@maghreb-equipements.test', 'telephone' => '+212 5 37 80 90 10'],
        ];

        foreach ($entreprises as $entreprise) {
            User::factory()->create($entreprise + [
                'role' => 'Entreprise',
            ]);
        }

        $techniciens = [
            ['name' => 'Youssef El Amrani', 'email' => 'youssef.technicien@maintenanceconnect.test', 'telephone' => '+212 6 61 11 22 33'],
            ['name' => 'Hamza Alaoui', 'email' => 'hamza.technicien@maintenanceconnect.test', 'telephone' => '+212 6 62 22 33 44'],
            ['name' => 'Mehdi Bennani', 'email' => 'mehdi.technicien@maintenanceconnect.test', 'telephone' => '+212 6 63 33 44 55'],
            ['name' => 'Othmane Idrissi', 'email' => 'othmane.technicien@maintenanceconnect.test', 'telephone' => '+212 6 64 44 55 66'],
            ['name' => 'Zakaria Tazi', 'email' => 'zakaria.technicien@maintenanceconnect.test', 'telephone' => '+212 6 65 55 66 77'],
            ['name' => 'Anas El Mansouri', 'email' => 'anas.technicien@maintenanceconnect.test', 'telephone' => '+212 6 66 66 77 88'],
            ['name' => 'Imane Chafai', 'email' => 'imane.technicien@maintenanceconnect.test', 'telephone' => '+212 6 67 77 88 99'],
            ['name' => 'Nadia Berrada', 'email' => 'nadia.technicien@maintenanceconnect.test', 'telephone' => '+212 6 68 88 99 00'],
        ];

        foreach ($techniciens as $technicien) {
            User::factory()->create($technicien + [
                'role' => 'Technicien',
            ]);
        }

        // Seeders
        $this->call([
            CompetenceSeeder::class,
            ExperienceSeeder::class,
            MissionSeeder::class,
            OffreSeeder::class,
            EvaluationSeeder::class,
        ]);
    }
}