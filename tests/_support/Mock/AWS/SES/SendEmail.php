<?php

namespace App\Tests\Mock\AWS\SES;

use App\Application\Channel\Provider\Email\EmailProviderInterface;
use App\Domain\Model\NotificationInterface;

class SendEmail implements EmailProviderInterface
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
