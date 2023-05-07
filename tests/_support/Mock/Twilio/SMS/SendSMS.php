<?php

namespace App\Tests\Mock\Twilio\SMS;

use App\Application\Channel\Provider\SMS\SMSProviderInterface;
use App\Domain\Model\NotificationInterface;

class SendSMS implements SMSProviderInterface
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
