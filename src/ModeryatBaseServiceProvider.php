<?php

namespace Codehubcare\Moderyat;

use Illuminate\Support\ServiceProvider;

class ModeryatBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
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
