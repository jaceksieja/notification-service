<?php

namespace App\Application\Channel;

class PushChannel implements ChannelInterface
{
    public static function getType(): Channel
    {
        return Channel::from('push');
    }
}
