<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $primaryKey = 'id_notification';
    protected $fillable = [
        'type',
        'message',
        'date_notification',
        'read_at',
        'id_utilisateur'
    ];

    protected function casts(): array
    {
        return [
            'date_notification' => 'datetime',
            'read_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}