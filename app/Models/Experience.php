<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
      use HasFactory;
    protected $primaryKey = 'id_experience';

    protected $fillable = [
        'poste',
        'entreprise',
        'date_debut',
        'date_fin',
        'description',
        'id_utilisateur',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}