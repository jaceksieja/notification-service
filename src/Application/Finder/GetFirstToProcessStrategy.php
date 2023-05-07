<?php

namespace App\Application\Finder;

use App\Application\Model\OutboxInterface;
use App\Application\Repository\OutboxRepositoryInterface;

readonly class GetFirstToProcessStrategy implements OutboxToProcessStrategyInterface
{
    public function __construct(
        private OutboxRepositoryInterface $outboxRepository
    ) {
    }

    public function find(): ?OutboxInterface
    {
        return $this->outboxRepository->findOne();
    }
}
