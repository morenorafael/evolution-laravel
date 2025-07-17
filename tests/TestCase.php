<?php

namespace Morenorafael\EvolutionLaravel\Tests;

use Illuminate\Contracts\Config\Repository;
use Morenorafael\EvolutionLaravel\Facades\Evolution;
use Morenorafael\EvolutionLaravel\Providers\EvolutionServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Illuminate\Support\Str;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use WithWorkbench;

    /**
     * Automatically enables package discoveries.
     *
     * @var bool
     */
    protected $enablesPackageDiscoveries = true;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app) 
    {
        return [
            EvolutionServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app) 
    {
        return [
            'Evolution' => Evolution::class,
        ];
    }

    protected function defineEnvironment($app) 
    {
        // Setup default database to use sqlite :memory:
        tap($app['config'], function (Repository $config) { 
            $config->set('evolution.url', 'https://subdomain.domain.com');
            $config->set('evolution.key', Str::random(40));
            $config->set('evolution.prefix', 'evolution_');
        });
    }
}
