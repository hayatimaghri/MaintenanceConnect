<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\mission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Offre extends Model
{

   use HasFactory;
    protected $primaryKey = 'id_offre';
    protected $fillable = [
        'prix',
        'message',
        'delai',
        'pre_diagnostic',
        'statut',
        'date_offre',
        'id_mission',
        'id_utilisateur'
    ];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class, 'id_mission');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}