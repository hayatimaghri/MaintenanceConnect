<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Offre;

class OffrePolicy
{
    public function viewAny(User $user)
    {
        return $user->role === 'Admin' || $user->role === 'Entreprise' || $user->role === 'Technicien';
    }

    public function view(User $user, Offre $offre)
    {
        return $user->role === 'Admin' || $user->role === 'Entreprise' || $user->role === 'Technicien';
    }

    public function accept(User $user, Offre $offre)
    {
        return $user->role === 'Entreprise' && $offre->mission->id_utilisateur === $user->id;
    }

    public function create(User $user)
    {
        return $user->role === 'Admin' || $user->role === 'Technicien';
    }
}