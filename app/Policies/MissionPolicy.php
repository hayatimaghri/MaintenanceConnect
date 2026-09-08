<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Mission;
use Illuminate\Auth\Access\Response;

class MissionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 'Admin' || $user->role === 'Entreprise' || $user->role === 'Technicien';
    }

    public function view(User $user, Mission $mission): bool
    {
        return $user->role === 'Admin' || $user->role === 'Entreprise' || $user->role === 'Technicien';
    }

    public function create(User $user): Response
    {
        return $user->role === 'Entreprise'
            ? Response::allow()
            : Response::deny('Seules les entreprises peuvent créer une mission.');
    }

    public function update(User $user, Mission $mission): Response
    {
        return $user->role === 'Admin' || ($user->role === 'Entreprise' && $mission->id_utilisateur === $user->id)
            ? Response::allow()
            : Response::deny('Vous ne pouvez modifier que vos propres missions.');
    }

    public function delete(User $user, Mission $mission): Response
    {
        return $user->role === 'Admin' || ($user->role === 'Entreprise' && $mission->id_utilisateur === $user->id)
            ? Response::allow()
            : Response::deny('Vous ne pouvez gérer que vos propres missions.');
    }
}