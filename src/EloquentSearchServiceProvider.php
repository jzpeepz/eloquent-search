<?php

namespace Jzpeepz\EloquentSearch;

use Illuminate\Support\ServiceProvider;
use Jzpeepz\EloquentSearch\Console\Commands\SearchInitialize;

class EloquentSearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'eloquent-search');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'eloquent-search');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('eloquent-search.php'),
            ], 'eloquent-search-config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/eloquent-search'),
            ], 'eloquent-search-views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/eloquent-search'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/eloquent-search'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                SearchInitialize ::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'eloquent-search');

        // Register the main class to use with the facade
        $this->app->singleton('eloquent-search', function () {
            return new EloquentSearch;
        });
    }
}
