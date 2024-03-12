<?php

namespace MBLSolutions\Notifications\Driver;

use MBLSolutions\Notifications\Contracts\Driver\DriverInterface;
use MBLSolutions\Notifications\Data\Notification;

class StackDriver implements DriverInterface
{
    private array $drivers;

    public function __construct(array $drivers)
    {
        $this->drivers = $drivers;
    }

    public function send(Notification $notification): void
    {
        /** @var DriverInterface $driver */
        foreach ($this->drivers as $driver) {
            $driver->send($notification);
        }
    }
}