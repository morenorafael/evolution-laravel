<?php

namespace Morenorafael\EvolutionLaravel\Services;

use Illuminate\Http\Client\PendingRequest;

class GetInfo
{
    protected array $info;

    public function __construct(protected PendingRequest $request)
    {
        $this->makeRequest();
    }

    protected function makeRequest()
    {
        $this->info = $this->request->get('/')->json();
    }

    public function getStatus(): int
    {
        return $this->info['status'];
    }

    public function isSuccessful(): bool
    {
        return $this->info['status'] === 200;
    }

    public function getMessage(): string
    {
        return $this->info['message'];
    }

    public function getVersion(): string
    {
        return $this->info['version'];
    }

    public function getSwagger(): string
    {
        return $this->info['swagger'];
    }

    public function getManager(): string
    {
        return $this->info['manager'];
    }

    public function getDocumentation(): string
    {
        return $this->info['documentation'];
    }

    public function toArray(): array
    {
        return $this->info;
    }
}
