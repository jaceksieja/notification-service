<?php

namespace App\Domain\Channel;

use App\Domain\Model\NotificationInterface;

interface ProviderInterface
{
    public function supports(Channel $channel): bool;

    public function send(NotificationInterface $notification): bool;
}
