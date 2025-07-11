<?php

namespace Morenorafael\EvolutionLaravel\Services;

use Morenorafael\EvolutionLaravel\Services\Instances\Connect;
use Morenorafael\EvolutionLaravel\Services\Instances\Create;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Morenorafael\EvolutionLaravel\Services\Instances\Webhook;

class Instance
{
    const WHATSAPP_BAILEYS = 'WHATSAPP-BAILEYS';

    const WHATSAPP_BUSINESS = 'WHATSAPP-BUSINESS';

    protected array $data;

    public function __construct(protected PendingRequest $request)
    {
        //
    }
    
    public function create(): array
    {
        return (new Create($this->request, $this->data))->makeRequest();
    }

    public function connect(): array
    {
        return (new Connect($this->request, $this->data['instanceName']))->makeRequest();
    }

    public function setWebhook(): Webhook
    {
        return new Webhook($this);
    }

    public function all(): Collection
    {
        return $this->request->get('/instance/fetchInstances')->collect();
    }

    public function findByName(string $name): array
    {
        return $this->request->get('/instance/fetchInstances', [
            'instanceName' => $name,
        ])->json();
    }

    public function setArray(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getArray(): array
    {
        return $this->data;
    }

    public function findById(string $id): array
    {
        return $this->request->get('/instance/fetchInstances', [
            'instanceId' => $id,
        ])->json();
    }

    public function setName(string $name): self
    {
        $this->data['instanceName'] = $name;

        return $this;
    }

    public function setIntegration(string $integration): self
    {
        $this->data['integration'] = $integration;

        return $this;
    }

    public function makeBaleys(): self
    {
        $this->data['integration'] = Instance::WHATSAPP_BAILEYS;

        return $this;
    }

    public function makeBusiness(): self
    {
        $this->data['integration'] = Instance::WHATSAPP_BUSINESS;

        return $this;
    }

    public function setToken(string $token): self
    {
        $this->data['token'] = $token;

        return $this;
    }

    public function makeQR(): self
    {
        $this->data['qr'] = true;

        return $this;
    }

    public function setNumber(string $number): self
    {
        $this->data['number'] = $number;

        return $this;
    }

    public function rejectCall(): self
    {
        $this->data['rejectCall'] = true;

        return $this;
    }

    public function setMsgCall(string $msgCall): self
    {
        $this->data['msgCall'] = $msgCall;

        return $this;
    }

    public function groupsIgnore(): self
    {
        $this->data['groupsIgnore'] = true;

        return $this;
    }

    public function alwaysOnline(): self
    {
        $this->data['alwaysOnline'] = true;

        return $this;
    }

    public function markReadMessages(): self
    {
        $this->data['readMessages'] = true;

        return $this;
    }

    public function markReadStatus(): self
    {
        $this->data['readStatus'] = true;

        return $this;
    }

    public function syncFullHistory(): self
    {
        $this->data['syncFullHistory'] = true;

        return $this;
    }

    public function setProxyHost(string $proxyHost): self
    {
        $this->data['proxyHost'] = $proxyHost;

        return $this;
    }

    public function setProxyPort(string $proxyPort): self
    {
        $this->data['proxyPort'] = $proxyPort;

        return $this;
    }

    public function setProxyProtocol(string $proxyProtocol): self
    {
        $this->data['proxyProtocol'] = $proxyProtocol;

        return $this;
    }

    public function setProxyUsername(string $proxyUsername): self
    {
        $this->data['proxyUsername'] = $proxyUsername;

        return $this;
    }

    public function setProxyPassword(string $proxyPassword): self
    {
        $this->data['proxyPassword'] = $proxyPassword;

        return $this;
    }
}
