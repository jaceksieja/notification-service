<?php

namespace App\Domain\Channel;

interface ChannelInterface
{
    public static function getType(): Channel;
}
