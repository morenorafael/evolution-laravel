<?php

namespace Morenorafael\EvolutionLaravel\Services\Instances;

use Illuminate\Http\Client\PendingRequest;

class Create
{
    public function __construct(protected PendingRequest $request, protected array $data)
    {
        //
    }

    public function makeRequest()
    {
        return $this->request->post('/instance/create', $this->data)->json();
    }
}
