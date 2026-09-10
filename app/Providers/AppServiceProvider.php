<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Event;

use App\Models\Mission;
use App\Models\Offre;
use App\Policies\MissionPolicy;
use App\Policies\OffrePolicy;
use App\Events\OfferAccepted;
use App\Listeners\CreateOfferAcceptedNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Policies
        Gate::policy(Mission::class, MissionPolicy::class);
        Gate::policy(Offre::class, OffrePolicy::class);

        // Gates
        Gate::define('isAdmin', fn($user) => $user->role === 'Admin');
        Gate::define('isEntreprise', fn($user) => $user->role === 'Entreprise');
        Gate::define('isTechnicien', fn($user) => $user->role === 'Technicien');

        // Events / Listeners
        Event::listen(
            OfferAccepted::class,
            CreateOfferAcceptedNotification::class
        );
    }
}