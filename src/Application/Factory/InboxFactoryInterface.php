<?php

namespace App\Application\Factory;

use App\Application\Model\InboxInterface;
use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;

interface InboxFactoryInterface
{
    public function create(Type $type, Channel $channel, string $userIdentifier): InboxInterface;
}
