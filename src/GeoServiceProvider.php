<?php

namespace Roem\Geo;

use Illuminate\Support\ServiceProvider;

class GeoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-geo.php' => config_path('laravel-geo.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../public/js/' => public_path('vendor/roem')
        ], 'public');

        $this->publishes([
            __DIR__.'/../resources/js/' => resource_path('assets/vendor/roem/laravel-geo')
        ], 'resources');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-geo.php', 'laravel-geo'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
