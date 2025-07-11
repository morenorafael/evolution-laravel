<?php

namespace Morenorafael\EvolutionLaravel\Tests;

use Morenorafael\EvolutionLaravel\Facades\Evolution;
use Morenorafael\EvolutionLaravel\Providers\EvolutionServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;

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
}
