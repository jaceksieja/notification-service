<?php

namespace App\Infrastructure\Factory;

use App\Domain\Factory\NotificationFactoryInterface;
use App\Infrastructure\Entity\Notification;

class NotificationFactory implements NotificationFactoryInterface
{
    public function create(): Notification
    {
        return new Notification();
    }
}
