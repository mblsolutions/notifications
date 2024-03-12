<?php

namespace MBLSolutions\Notifications;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class NotificationsServiceProvider extends BaseServiceProvider
{
    public static array $publishes = [
        __DIR__ . '/../config/notifications.php' => config_path('notifications.php'),
    ];

    public function register(): void
    {
        //
    }
}