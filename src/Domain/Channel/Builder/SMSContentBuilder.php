<?php

namespace App\Domain\Channel\Builder;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

class SMSContentBuilder implements ContentBuilderInterface
{
    public function supports(Channel $channel): bool
    {
        return Channel::SMS === $channel;
    }

    public function build(NotificationInterface $notification): string
    {
        // can generate different content based on $notification->getType();
        return 'some example message build form notification';
    }
}
