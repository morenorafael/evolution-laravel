<?php

namespace Morenorafael\EvolutionLaravel\Providers;

use Morenorafael\EvolutionLaravel\Services\EvolutionManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class EvolutionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/evolution.php', 'evolution'
        );

        $this->app->bind('morenorafael.evolution', function (Application $app) {
            $config = $app['config']['evolution'];

            $pendingRequest = Http::baseUrl($config['url'])->withHeaders([
                'Content-Type' => 'application/json',
                'apikey' => $config['key'],
            ]);

            return new EvolutionManager($pendingRequest);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/evolution.php' => config_path('evolution.php'),
        ]);

        $this->publishesMigrations([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ]);

        $this->publishes([
            __DIR__.'/../../config/evolution.php' => config_path('evolution.php')
        ], 'evolution-config');
    
        $this->publishesMigrations([
            __DIR__.'/../../database/migrations/' => database_path('migrations')
        ], 'evolution-migrations');
    }
}
