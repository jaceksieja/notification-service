<?php

namespace App\Domain\Channel\Resolver;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

interface ChannelsResolverInterface
{
    public function resolve(NotificationInterface $notification): ?Channel;
}
