<?php

namespace Codehubcare\Moderyat;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ModeryatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Autoload package's components
        Blade::componentNamespace('Codehubcare\\Views\\Components', 'moderyat');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'moderyat');

        // TODO: remove before publishing package
        // $this->publishes([
        //     __DIR__ . '/resources/views' => resource_path('views/vendor/moderyat'),
        // ]);

        // Publishing configuration files
        $this->publishes([
            __DIR__ . '/config/settings.php' => config_path('settings.php'),
        ], 'config');

        // Publishing assets folder
        $this->publishes([
            __DIR__ . '/public/' => public_path('vendor/moderyat'),
            __DIR__ . '/../node_modules/tinymce/models/' => public_path('vendor/moderyat/models'),
            __DIR__ . '/../node_modules/tinymce/icons/' => public_path('vendor/moderyat/icons'),
            __DIR__ . '/../node_modules/tinymce/skins/' => public_path('vendor/moderyat/skins'),
            __DIR__ . '/../node_modules/tinymce/plugins/' => public_path('vendor/moderyat/plugins'),
            __DIR__ . '/../node_modules/tinymce/themes/' => public_path('vendor/moderyat/themes'),

        ], 'public');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations'),
        ], 'migrations');

        // Publish models
        $this->publishes([
            __DIR__ . '/Models' => app_path('Models'),
        ]);
    }

    public function register()
    {
        // Register bindings, services and etc
    }
}
