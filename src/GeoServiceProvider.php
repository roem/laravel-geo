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

        // TODO: precompile js & publish to public

        $this->publishes([
            __DIR__.'/../resources/assets/js/' => resource_path('assets/vendor/roem/laravel-geo')
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
