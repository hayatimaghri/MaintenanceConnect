<?php

namespace App\Listeners;

use App\Events\NewOfferReceived;
use App\Models\Notification;

class CreateOfferNotification
{
    /**
     * Handle the event.
     */
    public function handle(NewOfferReceived $event): void
    {
        $offre = $event->offre;

        $mission = $offre->mission;

        Notification::create([
            'type' => 'nouvelle_offre',
            'message' => 'Nouvelle offre reçue.',
            'date_notification' => now(),
            'id_utilisateur' => $mission->id_utilisateur,
        ]);
    }
}