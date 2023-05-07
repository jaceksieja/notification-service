<?php

namespace App\Infrastructure\Integration\AWS\SES;

use App\Application\Channel\Provider\Email\EmailProviderInterface;
use App\Domain\Model\NotificationInterface;

class SendEmail implements EmailProviderInterface
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
