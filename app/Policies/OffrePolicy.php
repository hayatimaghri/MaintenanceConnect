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
        // Admin peut voir toutes les offres
        if ($user->role === 'Admin') {
            return true;
        }

        // Entreprise peut voir uniquement les offres
        // des missions qu'elle a créées
        if ($user->role === 'Entreprise') {
            return $offre->mission->id_utilisateur === $user->id;
        }

        // Technicien peut voir uniquement son propre offre
        if ($user->role === 'Technicien') {
            return $offre->id_utilisateur === $user->id;
        }

        return false;
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
            && $offre->statut === 'en attente'
            && $offre->mission->statut === 'Publiée';
            
    }

    public function refuse(User $user, Offre $offre): bool
    {
        return $user->role === 'Entreprise'
            && $offre->mission->id_utilisateur === $user->id
            && $offre->statut === 'en attente';
    }
}