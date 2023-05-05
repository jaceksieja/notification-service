<?php

namespace App\Application\Finder;

use App\Infrastructure\Entity\Inbox;
use App\Infrastructure\Repository\InboxRepository;

class GetFirstConsumeStrategy implements InboxToConsumeStrategyInterface
{
    public function __construct(
        private readonly InboxRepository $inboxRepository
    ) {
    }

    public function find(): ?Inbox
    {
        return $this->inboxRepository->findOne();
    }
}
