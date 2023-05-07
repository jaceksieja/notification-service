<?php

namespace App\Infrastructure\Factory;

use App\Application\Factory\OutboxFactoryInterface;
use App\Application\Model\OutboxInterface;
use App\Domain\Model\NotificationInterface;
use App\Infrastructure\Entity\Outbox;

class OutboxFactory implements OutboxFactoryInterface
{
    public function create(NotificationInterface $notification): OutboxInterface
    {
        $inbox = new Outbox();
        $inbox->setNotification($notification);

        return $inbox;
    }
}
