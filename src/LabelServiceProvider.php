<?php

namespace Qihucms\UserLabel;

use Illuminate\Support\ServiceProvider;

class LabelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'user-label');
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/user-label'),
        ]);
    }
}
