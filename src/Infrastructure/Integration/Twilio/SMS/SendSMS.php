<?php

namespace App\Infrastructure\Integration\Twilio\SMS;

use App\Application\Channel\Provider\SMS\SMSProviderInterface;
use App\Domain\Model\NotificationInterface;

class SendSMS implements SMSProviderInterface
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
