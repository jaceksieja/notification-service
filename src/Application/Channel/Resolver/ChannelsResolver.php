<?php

namespace App\Application\Channel\Resolver;

use App\Application\Channel\Channel;
use App\Domain\Channel\Resolver\ChannelsResolverInterface;
use App\Domain\Model\NotificationInterface;

class ChannelsResolver implements ChannelsResolverInterface
{
    public function resolve(NotificationInterface $notification): iterable
    {
        return [
            Channel::from('email'),
            Channel::from('sms'),
        ];
    }
}
