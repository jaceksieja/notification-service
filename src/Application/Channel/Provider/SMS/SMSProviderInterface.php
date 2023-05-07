<?php

namespace App\Application\Channel\Provider\SMS;

use App\Domain\Model\NotificationInterface;

interface SMSProviderInterface
{
    public function send(NotificationInterface $notification): bool;

    public static function getDefaultPriority(): int;
}
