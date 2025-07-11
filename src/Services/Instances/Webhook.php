<?php

namespace Morenorafael\EvolutionLaravel\Services\Instances;

use Morenorafael\EvolutionLaravel\Services\Instance;

class Webhook
{
    protected array $data;

    public function __construct(protected Instance $instance)
    {
        $this->data = $instance->getArray();
    }

    public function saveAndReturnToInstance(): Instance
    {
        return $this->instance->setArray($this->data);
    }

    public function setUrl(string $url): self
    {
        $this->data['webhook']['url'] = $url;

        return $this;
    }

    public function setAuthorization(string $key): self
    {
        $this->data['webhook']['headers']['authorization'] = $key;

        return $this;
    }

    public function addContentType(string $value): self
    {
        $this->data['webhook']['headers']['Content-Type'] = $value;

        return $this;
    }

    public function setHeaders(array $headers): self
    {
        $this->data['webhook']['headers'] = $headers;

        return $this;
    }

    public function addHeader(string $key, string $value): self
    {
        $this->data['webhook']['headers'][$key] = $value;

        return $this;
    }

    public function setEvents(array $events): self
    {
        $this->data['webhook']['events'] = $events;

        return $this;
    }

    public function addEvent(string $event): self
    {
        $this->data['webhook']['events'][] = $event;

        return $this;
    }
}
