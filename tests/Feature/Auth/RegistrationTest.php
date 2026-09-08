<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_technicians_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'Technicien',
        ]);

        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'role' => 'Technicien',
        ]);

        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_admins_cannot_register(): void
    {
        $response = $this->from('/register')->post('/register', [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => 'Admin',
        ]);

        $response->assertSessionHasErrors('role');
        $this->assertGuest();

        $this->assertDatabaseMissing('users', [
            'email' => 'admin@example.com',
        ]);
    }
}
