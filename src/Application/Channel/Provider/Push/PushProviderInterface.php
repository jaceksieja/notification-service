<?php

namespace App\Application\Channel\Provider\Push;

use App\Domain\Model\NotificationInterface;

interface PushProviderInterface
{
    public function send(NotificationInterface $notification): bool;

    public static function getDefaultPriority(): int;
}
