<?php

namespace App\Providers;

use App\Events\TagihanUpdated;
use App\Listeners\UpdateDaftarTagihanStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\statusruanganEvent;
use App\Listeners\statusruanganListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        statusruanganEvent::class => [
            statusruanganListener::class,
        ],
        TagihanUpdated::class => [
            UpdateDaftarTagihanStatus::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
