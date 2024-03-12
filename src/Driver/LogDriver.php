<?php

namespace MBLSolutions\Notifications\Driver;

use MBLSolutions\Notifications\Contracts\Driver\DriverInterface;
use MBLSolutions\Notifications\Data\Notification;
use Psr\Log\LoggerInterface;

class LogDriver implements DriverInterface
{
    private LoggerInterface $log;

    public function __construct(LoggerInterface $log)
    {
        $this->log = $log;
    }

    public function send(Notification $notification): void
    {
        $this->log->error($notification->getMessage(), $notification->getContext());
    }
}