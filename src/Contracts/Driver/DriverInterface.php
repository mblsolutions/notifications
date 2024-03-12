<?php

namespace MBLSolutions\Notifications\Contracts\Driver;

use MBLSolutions\Notifications\Data\Notification;

interface DriverInterface
{
    public function send(Notification $notification): void;
}