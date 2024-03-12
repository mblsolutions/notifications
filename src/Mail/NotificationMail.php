<?php

namespace MBLSolutions\Notifications\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use MBLSolutions\Notifications\Data\Notification;

class NotificationMail extends Mailable
{
    private Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                    config('notifications.channels.mail.default_from.address'),
                    config('notifications.channels.mail.default_from.name')
                ),
            to: [
                new Address(
                    config('notifications.channels.mail.default_to.address'),
                    config('notifications.channels.mail.default_to.name')
                )
            ],
            subject: $this->notification->getMessage(),
        );
    }

    public function content(): Content
    {
        $textContent = $this->notification->getMessage();

        if ($this->notification->getContext()) {
            $textContent .= PHP_EOL . PHP_EOL . json_encode($this->notification->getContext(), JSON_PRETTY_PRINT);
        }

        return new Content(
            text: $textContent,
        );
    }
}