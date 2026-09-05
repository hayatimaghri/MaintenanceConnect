<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Mission;

class MissionPolicy
{
    public function viewAny(User $user)
    {
        return $user->role === 'Admin' || $user->role === 'Entreprise' || $user->role === 'Technicien';
    }

    public function view(User $user, Mission $mission)
    {
        return $user->role === 'Admin' || $user->role === 'Entreprise' || $user->role === 'Technicien';
    }

    public function create(User $user)
{
    return $user->role === 'Admin' || $user->role === 'Entreprise';
}

public function update(User $user, Mission $mission)
    {
        return $user->role === 'Admin' || ($user->role === 'Entreprise' && $mission->id_utilisateur === $user->id);
    }

    public function delete(User $user, Mission $mission)
    {
        return $user->role === 'Admin' || ($user->role === 'Entreprise' && $mission->id_utilisateur === $user->id);
    }
}