<?php

namespace Mr687\Wamazing\Providers;

use Illuminate\Support\ServiceProvider;
use Mr687\Wamazing\Wamazing;

class WamazingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('wamazing.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'wamazing');

        // Register the main class to use with the facade
        $this->app->singleton('wamazing', function () {
            return new Wamazing;
        });
    }
}
