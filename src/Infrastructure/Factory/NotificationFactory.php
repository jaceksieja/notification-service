<?php

namespace App\Infrastructure\Factory;

use App\Domain\Channel\Channel;
use App\Domain\Factory\NotificationFactoryInterface;
use App\Domain\Notification\Type;
use App\Infrastructure\Entity\Notification;

class NotificationFactory implements NotificationFactoryInterface
{
    public function create(Type $type, Channel $channel, string $userIdentifier): Notification
    {
        $notification = new Notification();
        $notification->setType($type);
        $notification->setChannel($channel);
        $notification->setUserIdentifier($userIdentifier);

        return $notification;
    }
}
