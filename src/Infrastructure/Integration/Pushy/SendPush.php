<?php

namespace App\Infrastructure\Integration\Pushy;

use App\Application\Channel\Provider\Push\PushProviderInterface;
use App\Domain\Model\NotificationInterface;

class SendPush implements PushProviderInterface
{
    public function send(NotificationInterface $notification): bool
    {
        return false;
    }

    public static function getDefaultPriority(): int
    {
        return 100;
    }
}
