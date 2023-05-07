<?php

namespace App\Infrastructure\Factory;

use App\Application\Factory\InboxFactoryInterface;
use App\Application\Model\InboxInterface;
use App\Domain\Channel\Channel;
use App\Infrastructure\Entity\Inbox;

class InboxFactory implements InboxFactoryInterface
{
    public function create(Channel $channel, string $userIdentifier): InboxInterface
    {
        $inbox = new Inbox();
        $inbox->setChannel($channel);
        $inbox->setUserIdentifier($userIdentifier);

        return $inbox;
    }
}
