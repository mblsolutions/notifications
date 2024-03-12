<?php

namespace MBLSolutions\Notifications;

use MBLSolutions\Notifications\Driver\LogDriver;
use MBLSolutions\Notifications\Driver\MailDriver;
use MBLSolutions\Notifications\Driver\SlackDriver;
use MBLSolutions\Notifications\Driver\StackDriver;
use MBLSolutions\Notifications\Driver\TeamsDriver;
use Illuminate\Log\LogManager;
use Illuminate\Support\Manager;
use Sebbmyr\Teams\TeamsConnector;


class ErrorReportingManager extends Manager
{
    public function getDefaultDriver(): string
    {
        return $this->config->get('error-reporting.default');
    }

    public function createStackDriver(): StackDriver
    {
        return $this->container->make(StackDriver::class);
    }

    public function createLogDriver(): LogDriver
    {
        $logChannelName = $this->config->get('error-reporting.channels.log.channel');

        /** @var LogManager $logManager */
        $logManager = $this->container->make(LogManager::class);

        $log = $logManager->channel($logChannelName);

        return $this->container->make(LogDriver::class, [
            'log' => $log,
        ]);
    }

    public function createTeamsDriver()
    {
        return $this->container->make(TeamsDriver::class, [
            'connector' => new TeamsConnector($this->config->get('error-reporting.channels.teams.webhook')),
        ]);
    }

    public function createMailDriver(): MailDriver
    {
        return $this->container->make(MailDriver::class);
    }
}