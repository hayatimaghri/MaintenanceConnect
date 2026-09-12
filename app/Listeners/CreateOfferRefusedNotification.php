<?php

namespace App\Listeners;

use App\Events\OfferRefused;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOfferRefusedNotification implements ShouldQueue
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