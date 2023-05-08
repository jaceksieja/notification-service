<?php

namespace App\Infrastructure\Factory;

use App\Application\Factory\InboxFactoryInterface;
use App\Application\Model\InboxInterface;
use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;
use App\Infrastructure\Entity\Inbox;

class InboxFactory implements InboxFactoryInterface
{
    public function create(Type $type, Channel $channel, string $userIdentifier): InboxInterface
    {
        $inbox = new Inbox();
        $inbox->setType($type);
        $inbox->setChannel($channel);
        $inbox->setUserIdentifier($userIdentifier);

        return $inbox;
    }
}
