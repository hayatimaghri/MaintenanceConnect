<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Offre;

class OffrePolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'Admin',
            'Entreprise',
            'Technicien'
        ]);
    }

    public function view(User $user, Offre $offre): bool
    {
        return in_array($user->role, [
            'Admin',
            'Entreprise',
            'Technicien'
        ]);
    }

    public function create(User $user): bool
    {
        return $user->role === 'Technicien';
    }

    public function update(User $user, Offre $offre): bool
    {
        return $user->role === 'Technicien'
            && $offre->id_utilisateur === $user->id
            && $offre->statut === 'en attente';
    }

    public function delete(User $user, Offre $offre): bool
    {
        return $user->role === 'Technicien'
            && $offre->id_utilisateur === $user->id
            && $offre->statut === 'en attente';
    }

    public function accept(User $user, Offre $offre): bool
    {
        return $user->role === 'Entreprise'
            && $offre->mission->id_utilisateur === $user->id
            && $offre->statut === 'en attente';
    }

    public function refuse(User $user, Offre $offre): bool
    {
        return $user->role === 'Entreprise'
            && $offre->mission->id_utilisateur === $user->id
            && $offre->statut === 'en attente';
    }
}