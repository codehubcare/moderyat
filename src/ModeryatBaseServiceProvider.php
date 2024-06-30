<?php

namespace Codehubcare\Moderyat;

use Illuminate\Support\ServiceProvider;

class ModeryatBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'moderyat');

        // Publishing configuration files
        $this->publishes([
            __DIR__ . '../config/settings.php' => config_path('settings.php',)
        ], 'config');
    }

    public function register()
    {
        // Register bindings, services and etc
    }
}
