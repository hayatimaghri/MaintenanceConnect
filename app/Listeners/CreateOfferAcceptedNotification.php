<?php

namespace App\Listeners;

use App\Events\OfferAccepted;
use App\Models\Notification;

class CreateOfferAcceptedNotification
{
    public function handle(OfferAccepted $event): void
    {
        $offre = $event->offre;

        Notification::create([
            'type' => 'offre_acceptee',
            'message' => 'Votre offre a été acceptée.',
            'date_notification' => now(),
            'id_utilisateur' => $offre->id_utilisateur,
        ]);
    }
}