<?php

namespace App\Application\Channel;

class SMSChannel implements ChannelInterface
{
    public static function getType(): Channel
    {
        return Channel::from('sms');
    }
}
