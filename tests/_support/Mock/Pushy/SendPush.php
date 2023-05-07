<?php

namespace App\Tests\Mock\Pushy;

use App\Application\Channel\Provider\Push\PushProviderInterface;
use App\Domain\Model\NotificationInterface;

class SendPush implements PushProviderInterface
{
    public array $results = [];

    public function send(NotificationInterface $notification): bool
    {
        $this->results[$notification->getId()] = false;

        return false;
    }

    public static function getDefaultPriority(): int
    {
        return 100;
    }
}
