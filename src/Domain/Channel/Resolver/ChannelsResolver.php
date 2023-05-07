<?php

namespace App\Domain\Channel\Resolver;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

class ChannelsResolver implements ChannelsResolverInterface
{
    public function __construct(
        private array $enabledChannels
    ) {
    }

    public function resolve(NotificationInterface $notification): ?Channel
    {
        $channel = $notification->getChannel();

        if (!in_array($channel->value, $this->enabledChannels, true)) {
            return null;
        }

        return $channel;
    }
}
