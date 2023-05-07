<?php

namespace App\Domain\Channel\Builder;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;

class SMSContentBuilder implements ContentBuilderInterface
{
    public function supports(Channel $channel): bool
    {
        return $channel === Channel::from('sms');
    }

    public function build(NotificationInterface $notification): string
    {
        return 'some example message build form notification';
    }
}
