<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Offre;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission extends Model
{
       use HasFactory;
    protected $primaryKey = 'id_mission';
    protected $fillable = [
        'localisation',
        'titre',
        'description',
        'budget',
        'priorite',
        'statut',
        'date_publication',
        'date_limite',
        'id_utilisateur'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function offres(): HasMany
    {
        return $this->hasMany(Offre::class, 'id_mission');
    }

 public function evaluation(): HasOne
{
    return $this->hasOne(Evaluation::class, 'id_mission', 'id_mission');
}
}