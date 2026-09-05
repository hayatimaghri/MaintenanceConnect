<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Evaluation extends Model
{
       use HasFactory;
       
    protected $primaryKey = 'id_evaluation';

    protected $fillable = [
        'note',
        'commentaire',
        'id_mission',
        'id_utilisateur',
    ];

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class, 'id_mission', 'id_mission');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}