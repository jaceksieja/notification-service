<?php

namespace App\Application\Finder;

use App\Application\Model\InboxInterface;
use App\Application\Repository\InboxRepositoryInterface;

readonly class GetFirstConsumeStrategy implements InboxToConsumeStrategyInterface
{
    public function __construct(
        private InboxRepositoryInterface $inboxRepository
    ) {
    }

    public function find(): ?InboxInterface
    {
        return $this->inboxRepository->findOne();
    }
}
