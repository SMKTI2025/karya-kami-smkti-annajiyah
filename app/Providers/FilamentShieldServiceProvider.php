<?php

namespace App\Providers;

use App\Filament\Resources\RoleResource;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentShieldServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Filament::registerResources([
            RoleResource::class,
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
