<?php

namespace Codehubcare\Moderyat;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ModeryatBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Autoloading package's components
        Blade::componentNamespace('Codehubcare\\Views\\Components', 'moderyat');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'moderyat');
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/moderyat'),
        ]);

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
