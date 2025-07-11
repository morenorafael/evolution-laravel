<?php

namespace Morenorafael\EvolutionLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Morenorafael\EvolutionLaravel\Facades\Evolution;

class EvolutionInstance extends Model
{
    protected $fillable = [
        'name',
        'identification',
        'instanceable_id',
        'instanceable_type',
    ];

    public function instanceable(): MorphTo
    {
        return $this->morphTo();
    }

    public function bind(string $name, bool $isBusiness, ?string $phone = null): bool
    {
        $name = config('evolution.prefix') . $name;

        $instance = Evolution::instance()
            ->setName($name)
            ->makeQR();

        if ($isBusiness) {
            $instance->makeBusiness();
        } else {
            $instance->makeBaleys();
        }

        if (!is_null($phone)) {
            $instance->setNumber($phone);
        }

        $data = $instance->create();

        $this->name = $data['instance']['instanceName'];
        $this->identification = $data['instance']['instanceId'];
        $this->instanceable_id = $this->instanceable->id;
        $this->instanceable_type = get_class($this->postable);

        return $this->save();
    }
}
