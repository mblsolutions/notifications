<?php

namespace Tests\Integration\ErrorReporting\Driver;

use MBLSolutions\Notifications\Data\Notification;
use MBLSolutions\Notifications\Driver\TeamsDriver;
use MBLSolutions\Notifications\Tests\TestCase;
use Sebbmyr\Teams\TeamsConnector;
use RuntimeException;

class TeamsDriverTest extends TestCase
{
    protected TeamsDriver $driver;

    protected function setUp(): void
    {
        parent::setUp();

        $this->driver = $this->app->make(TeamsDriver::class, [
            'connector' => $this->mock(TeamsConnector::class, function ($mock) {
                $mock->shouldReceive('send')->once();
            }),
        ]);
    }

    /** @test */
    public function it_sends_notification(): void
    {
        $this->driver->send(new Notification('This is a test message.'));
    }

    /** @test */
    public function it_sends_exception_notification(): void
    {
        $this->driver->send(
            Notification::fromException(
                new RuntimeException('This is a test exception.')
            )
        );
    }
}