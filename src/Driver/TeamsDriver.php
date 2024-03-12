<?php

namespace MBLSolutions\Notifications\Driver;

use MBLSolutions\Notifications\Contracts\Driver\DriverInterface;
use MBLSolutions\Notifications\Data\Notification;
use Sebbmyr\Teams\Cards\CustomCard;
use Sebbmyr\Teams\TeamsConnector;

class TeamsDriver implements DriverInterface
{
    private TeamsConnector $connector;

    public function __construct(TeamsConnector $connector)
    {
        $this->connector = $connector;
    }

    public function send(Notification $notification): void
    {
        $card = new CustomCard(config('app.name'));
        $card->setText($notification->getMessage());

        if (count($notification->getContext()) > 0) {
            $card->addFacts('Context', $notification->getContext());
        }

        $this->connector->send($card);
    }
}