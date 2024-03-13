<?php

namespace MBLSolutions\Notifications;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class NotificationsServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/notifications.php' => config_path('notifications.php'),
        ], 'config');
    }

    public function register(): void
    {
        //
    }
}