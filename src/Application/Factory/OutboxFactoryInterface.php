<?php

namespace App\Application\Factory;

use App\Application\Model\OutboxInterface;
use App\Domain\Model\NotificationInterface;

interface OutboxFactoryInterface
{
    public function create(NotificationInterface $notification): OutboxInterface;
}
