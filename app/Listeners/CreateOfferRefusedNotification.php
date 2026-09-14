<?php

namespace App\Listeners;

use App\Events\OfferRefused;
use App\Models\Notification;

class CreateOfferRefusedNotification
{
    public function handle(OfferRefused $event): void
    {
        $offre = $event->offre;

        Notification::create([
            'type' => 'offre_refusee',
            'message' => 'Votre offre a été refusée.',
            'date_notification' => now(),
            'id_utilisateur' => $offre->id_utilisateur,
        ]);
    }
}