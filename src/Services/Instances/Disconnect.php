<?php

declare(strict_types=1);

namespace Morenorafael\EvolutionLaravel\Services\Instances;

use Illuminate\Http\Client\PendingRequest;

class Disconnect
{
    public function __construct(protected PendingRequest $request, protected string $name)
    {
        //
    }

    public function makeRequest()
    {
        return $this->request->get("/instance/logout/{$this->name}")->json();
    }
}
