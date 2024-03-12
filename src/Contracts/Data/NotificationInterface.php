<?php

namespace MBLSolutions\Notifications\Contracts\Data;

interface NotificationInterface
{
    public function getMessage(): string;
    public function getContext(): array;
}