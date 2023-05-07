<?php

namespace App\Application\Finder;

use App\Application\Repository\InboxRepositoryInterface;
use App\Infrastructure\Entity\Inbox;

readonly class GetFirstConsumeStrategy implements InboxToConsumeStrategyInterface
{
    public function __construct(
        private InboxRepositoryInterface $inboxRepository
    ) {
    }

    public function find(): ?Inbox
    {
        return $this->inboxRepository->findOne();
    }
}
