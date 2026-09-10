<?php

namespace App\Listeners;

use App\Events\OfferAccepted;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOfferAcceptedNotification implements ShouldQueue
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