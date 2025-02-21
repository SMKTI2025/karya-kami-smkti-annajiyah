<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\LaravelSettings\SettingsContainer;
use App\Settings\KaryaSetting;

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
        // app(SettingsContainer::class)->registerConfig(KaryaSetting::class);
    }
}
