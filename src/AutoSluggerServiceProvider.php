<?php

namespace Ewebite\AutoSlugger;

use Illuminate\Support\ServiceProvider;

class AutoSluggerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/autoslugger.php' => config_path('autoslugger.php'),
        ], 'autoslugger.config');

        // Registering package commands.
        // $this->commands([]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/autoslugger.php', 'autoslugger');

        $this->app->singleton('autoslugger', function ($app) {
            return new AutoSlugger;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['autoslugger'];
    }
}