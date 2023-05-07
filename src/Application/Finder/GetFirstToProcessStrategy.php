<?php

namespace App\Application\Finder;

use App\Application\Repository\OutboxRepositoryInterface;
use App\Infrastructure\Entity\Outbox;

readonly class GetFirstToProcessStrategy implements OutboxToProcessStrategyInterface
{
    public function __construct(
        private OutboxRepositoryInterface $outboxRepository
    ) {
    }

    public function find(): ?Outbox
    {
        return $this->outboxRepository->findOne();
    }
}
