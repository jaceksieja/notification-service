<?php

namespace App\Domain\Action;

use App\Domain\Channel\Resolver\ChannelsResolverInterface;
use App\Domain\Channel\Sender\SenderInterface;
use App\Domain\Finder\PickNotificationStrategyInterface;

readonly class ProcessNotification
{
    public function __construct(
        private PickNotificationStrategyInterface $pickNotificationStrategy,
        private ChannelsResolverInterface $channelResolver,
        private SenderInterface $sender
    ) {
    }

    public function __invoke(): void
    {
        $notification = $this->pickNotificationStrategy->pick();

        if (null === $notification) {
            // @todo logging
            return;
        }

        $channel = $this->channelResolver->resolve($notification);

        if (null === $channel) {
            // @todo logging
            return;
        }

        $this->sender->send($channel, $notification);

        $notification->processed();
    }
}
