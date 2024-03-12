<?php

namespace Tests\Integration\ErrorReporting\Driver;

use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use MBLSolutions\Notifications\Data\Notification;
use MBLSolutions\Notifications\Driver\MailDriver;
use MBLSolutions\Notifications\Tests\TestCase;

class MailDriverTest extends TestCase
{
    /** @test */
    public function it_reports_error(): void
    {
        Mail::fake();

        $mailDriver = $this->app->make(MailDriver::class);
        $mailDriver->send(new Notification('Error message', ['context' => 'value']));

        
        Mail::assertSentCount(1);
    }
}