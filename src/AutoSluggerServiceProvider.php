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
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ewebite');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ewebite');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/autoslugger.php' => config_path('autoslugger.php'),
            ], 'autoslugger.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/ewebite'),
            ], 'autoslugger.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/ewebite'),
            ], 'autoslugger.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/ewebite'),
            ], 'autoslugger.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/autoslugger.php', 'autoslugger');

        // Register the service the package provides.
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