<?php

namespace App\Application\Action;

use App\Application\Factory\InboxFactoryInterface;
use App\Application\Repository\InboxRepositoryInterface;
use App\Domain\Channel\Channel;
use App\Infrastructure\Entity\Inbox as InboxRecord;

readonly class Inbox
{
    public function __construct(
        private InboxRepositoryInterface $inboxRepository,
        private InboxFactoryInterface $inboxFactory
    ) {
    }

    public function __invoke(Channel $channel, string $userIdentifier): InboxRecord
    {
        return $this->inboxRepository->save(
            $this->inboxFactory->create($channel, $userIdentifier)
        );
    }
}
