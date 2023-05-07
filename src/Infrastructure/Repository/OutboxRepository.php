<?php

namespace App\Infrastructure\Repository;

use App\Application\Repository\OutboxRepositoryInterface;
use App\Infrastructure\Entity\Outbox;

readonly class OutboxRepository implements OutboxRepositoryInterface
{
    public function __construct(
        private DoctrineRepository $doctrineRepository
    ) {
    }

    public function save(Outbox $outbox): Outbox
    {
        $this->doctrineRepository->getEntityManager()->persist($outbox);

        return $outbox;
    }

    public function findOne(): ?Outbox
    {
        return $this->doctrineRepository->findOneBy([]);
    }
}
