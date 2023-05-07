<?php

namespace App\Application\Channel;

class EmailChannel implements ChannelInterface
{
    public static function getType(): Channel
    {
        return Channel::from('email');
    }
}
