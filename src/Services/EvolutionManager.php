<?php

namespace Morenorafael\EvolutionLaravel\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class EvolutionManager
{
    public function __construct(protected PendingRequest $request)
    {
        //
    }

    public function getInfo(): GetInfo
    {
        return new GetInfo($this->request);
    }

    public function instance(): Instance
    {
        return new Instance($this->request);
    }

    public function fake(): void
    {
        Http::fake();
    }
}
