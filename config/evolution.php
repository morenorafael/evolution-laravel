<?php

return [

    'url' => env('EVOLUTION_URL'),

    'key' => env('EVOLUTION_KEY'),

    'prefix' => 'evolution_',

    'webhooks' => [

        'events' => [
            'CONNECTION_UPDATE',
        ],

    ],

];
