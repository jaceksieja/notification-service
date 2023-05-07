<?php

namespace App\Application\Factory;

use App\Application\Model\InboxInterface;
use App\Domain\Channel\Channel;

interface InboxFactoryInterface
{
    public function create(Channel $channel, string $userIdentifier): InboxInterface;
}
