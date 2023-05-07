<?php

namespace App\Application\Model;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

interface OutboxInterface
{
    public function getNotification(): NotificationInterface;

    public function getChannel(): Channel;

    public function processed(): void;
}
