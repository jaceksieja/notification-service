<?php

namespace App\Domain\Action;

use App\Domain\Channel\Resolver\ChannelsResolverInterface;
use App\Domain\Channel\Sender\SenderInterface;
use App\Domain\Finder\PickNotificationStrategyInterface;

readonly class ProcessNotification
{
    public function __construct(
        private PickNotificationStrategyInterface $pickNotificationStrategy,
        private ChannelsResolverInterface $channelsResolver,
        private SenderInterface $sender
    ) {
    }

    public function __invoke(): void
    {
        $notification = $this->pickNotificationStrategy->pick();

        if (null === $notification) {
            return;
        }

        $channels = $this->channelsResolver->resolve($notification);

        foreach ($channels as $channel) {
            $this->sender->send($channel, $notification);
        }
    }
}
