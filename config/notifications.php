<?php

return [

    'default' => env('NOTIFICATIONS_CHANNEL', 'stack'),

    'channels' => [

        'stack' => [
            'driver' => 'stack',
            'channels' => ['log', 'teams'],
        ],

        'log' => [
            'driver' => 'log',
            'log_channel' => env('NOTIFICATIONS_LOG_CHANNEL', config('logging.default', 'single')),
        ],

        'teams' => [
            'driver' => 'teams',
            'webhook_url' => env('NOTIFICATIONS_TEAMS_WEBHOOK_URL'),
        ],

        'mail' => [
            'driver' => 'mail',
            'mailer' => env('NOTIFICATIONS_MAILER', config('mail.default')),
            'default_from' => [
                'address' => env('NOTIFICATIONS_MAIL_FROM_ADDRESS', config('mail.from.address')),
                'name' => env('NOTIFICATIONS_MAIL_FROM_NAME', config('mail.from.name')),
            ],
            'default_to' => [
                'address' => env('NOTIFICATIONS_MAIL_TO_ADDRESS'),
                'name' => env('NOTIFICATIONS_MAIL_TO_NAME'),
            ],
        ],

    ],


];