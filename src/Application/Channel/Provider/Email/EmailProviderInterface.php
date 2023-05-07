<?php

namespace App\Application\Channel\Provider\Email;

use App\Domain\Model\NotificationInterface;

interface EmailProviderInterface
{
    public function send(NotificationInterface $notification): bool;

    public static function getDefaultPriority(): int;
}
