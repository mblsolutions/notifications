<?php

namespace MBLSolutions\Notifications\Driver;

use MBLSolutions\Notifications\Contracts\Driver\DriverInterface;
use MBLSolutions\Notifications\Data\Notification;
use Illuminate\Contracts\Mail\Factory as MailFactory;
use Illuminate\Contracts\Mail\Mailer;

class MailDriver implements DriverInterface
{
    private Mailer $mailer;

    public function __construct(MailFactory $mailFactory)
    {
        $this->mailer = $mailFactory->mailer(config('error-reporting.channels.mail.mailer'));
    }

    public function send(Notification $notification): void
    {
        $this->mailer->send($notification->buildMailMessage());
    }
}