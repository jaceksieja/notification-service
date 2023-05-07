<?php

namespace App\Infrastructure\Repository;

use App\Application\Model\OutboxInterface;
use App\Application\Repository\OutboxRepositoryInterface;

readonly class OutboxRepository implements OutboxRepositoryInterface
{
    public function __construct(
        private DoctrineRepository $doctrineRepository
    ) {
    }

    public function save(OutboxInterface $outbox): OutboxInterface
    {
        $this->doctrineRepository->getEntityManager()->persist($outbox);

        return $outbox;
    }

    public function findOne(): ?OutboxInterface
    {
        return $this->doctrineRepository->findOneBy(['processed' => false]);
    }
}
