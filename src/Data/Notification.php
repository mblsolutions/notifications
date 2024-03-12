<?php

namespace MBLSolutions\Notifications\Data;

use MBLSolutions\Notifications\Contracts\Data\NotificationInterface;
use MBLSolutions\Notifications\Mail\NotificationMail;
use Throwable;

class Notification implements NotificationInterface
{
    private string $message;
    private array $context;

    public function __construct(string $message, array $context = [])
    {
        $this->message = $message;
        $this->context = $context;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public static function fromException(Throwable $exception): self
    {
        return new self($exception->getMessage(), [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString(),
        ]);
    }

    public function buildMailMessage(): ?NotificationMail
    {
        return new NotificationMail($this);
    }
}