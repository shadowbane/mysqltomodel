<?php

namespace Shadowbane\MySQLModel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MySQLModelServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Shadowbane\MySQLModel\Http\Console\Generator'
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views','mysql-migration');

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->publishes([
            __DIR__. '/config/mysql-migration.php' => config_path('mysql-migration.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
