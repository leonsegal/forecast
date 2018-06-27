<?php

namespace Leonsegal\Forecast;

use Illuminate\Support\ServiceProvider;

class ForecastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Leonsegal\Forecast\ForecastController');
        $this->loadViewsFrom(__DIR__ . '/views', 'forecast');
    }
}
