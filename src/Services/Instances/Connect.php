<?php

namespace Morenorafael\EvolutionLaravel\Services\Instances;

use Illuminate\Http\Client\PendingRequest;

class Connect
{
    public function __construct(protected PendingRequest $request, protected string $name)
    {
        //
    }

    public function makeRequest()
    {
        return $this->request->get("/instance/connect/{$this->name}")->json();
    }
}
