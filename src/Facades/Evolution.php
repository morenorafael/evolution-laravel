<?php

namespace Morenorafael\EvolutionLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the Evolution module.
 *
 * @method static \Morenorafael\EvolutionLaravel\Services\GetInfo getInfo()
 * @method static \Morenorafael\EvolutionLaravel\Services\Instance instance()
 * @method static void fake()
 *
 * @see \Morenorafael\EvolutionLaravel\Services\EvolutionManager
 */
class Evolution extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'morenorafael.evolution';
    }
}
