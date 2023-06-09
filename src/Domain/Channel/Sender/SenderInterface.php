<?php

namespace App\Domain\Channel\Sender;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

interface SenderInterface
{
    public function send(Channel $channel, NotificationInterface $notification): void;
}
