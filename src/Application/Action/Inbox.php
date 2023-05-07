<?php

namespace App\Application\Action;

use App\Application\Factory\InboxFactoryInterface;
use App\Application\Model\InboxInterface;
use App\Application\Repository\InboxRepositoryInterface;
use App\Domain\Channel\Channel;

readonly class Inbox
{
    public function __construct(
        private InboxRepositoryInterface $inboxRepository,
        private InboxFactoryInterface $inboxFactory
    ) {
    }

    public function __invoke(Channel $channel, string $userIdentifier): InboxInterface
    {
        return $this->inboxRepository->save(
            $this->inboxFactory->create($channel, $userIdentifier)
        );
    }
}
