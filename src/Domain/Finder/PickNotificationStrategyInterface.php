<?php

namespace App\Domain\Finder;

use App\Domain\Model\NotificationInterface;

interface PickNotificationStrategyInterface
{
    public function pick(): ?NotificationInterface;
}
