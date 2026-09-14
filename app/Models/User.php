<?php

namespace App\Models;


use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'telephone',
    'role',
      'is_active'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function missions(): HasMany
    {
        return $this->hasMany(Mission::class, 'id_utilisateur');
    }

    public function offres(): HasMany
    {
        return $this->hasMany(Offre::class, 'id_utilisateur');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'id_utilisateur');
    }

    public function competences(): BelongsToMany
    {
        return $this->belongsToMany(
            Competence::class,
            'competences_users',
            'id_utilisateur',
            'id_competence'
        );
    }

    public function experiences(): HasMany
{
    return $this->hasMany(Experience::class, 'id_utilisateur');
}

public function evaluations(): HasMany
{
    return $this->hasMany(Evaluation::class, 'id_utilisateur');
}
}
