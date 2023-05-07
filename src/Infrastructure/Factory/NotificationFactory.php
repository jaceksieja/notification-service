<?php

namespace App\Infrastructure\Factory;

use App\Domain\Channel\Channel;
use App\Domain\Factory\NotificationFactoryInterface;
use App\Infrastructure\Entity\Notification;

class NotificationFactory implements NotificationFactoryInterface
{
    public function create(Channel $channel, string $userIdentifier): Notification
    {
        $notification = new Notification();
        $notification->setChannel($channel);
        $notification->setUserIdentifier($userIdentifier);

        return $notification;
    }
}
