<?php

namespace App\Providers;

use App\Models\rawat_inap;
use App\Observers\rawatinapObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\booking;
use App\Observers\bookingtagihanObserver;

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
        booking::observe(bookingtagihanObserver::class);
        rawat_inap::observe(rawatinapObserver::class);
    }
}
