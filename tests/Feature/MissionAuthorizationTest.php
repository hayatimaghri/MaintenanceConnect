<?php

namespace Tests\Feature;

use App\Models\Mission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MissionAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_entreprise_can_create_a_mission(): void
    {
        $entreprise = User::factory()->create(['role' => 'Entreprise']);

        $response = $this
            ->actingAs($entreprise)
            ->post(route('missions.store'), $this->missionData());

        $response->assertRedirect(route('missions.index'));

        $this->assertDatabaseHas('missions', [
            'titre' => 'Maintenance preventive test',
            'id_utilisateur' => $entreprise->id,
        ]);
    }

    public function test_technicien_cannot_create_a_mission(): void
    {
        $technicien = User::factory()->create(['role' => 'Technicien']);

        $response = $this
            ->actingAs($technicien)
            ->post(route('missions.store'), $this->missionData());

        $response->assertForbidden();
        $this->assertDatabaseCount('missions', 0);
    }

    public function test_admin_cannot_create_a_mission(): void
    {
        $admin = User::factory()->create(['role' => 'Admin']);

        $response = $this
            ->actingAs($admin)
            ->post(route('missions.store'), $this->missionData());

        $response->assertForbidden();
        $this->assertDatabaseCount('missions', 0);
    }

    private function missionData(): array
    {
        return [
            'localisation' => 'Casablanca',
            'titre' => 'Maintenance preventive test',
            'description' => 'Verification du fonctionnement de la machine.',
            'budget' => 5000,
            'priorite' => 'Haute',
            'statut' => 'Publiée',
            'date_publication' => '2026-09-06 10:00:00',
            'date_limite' => '2026-09-20 10:00:00',
        ];
    }
}