<?php

namespace App\Infrastructure\Repository;

use App\Application\Repository\InboxRepositoryInterface;
use App\Infrastructure\Entity\Inbox;

readonly class InboxRepository implements InboxRepositoryInterface
{
    public function __construct(
        private DoctrineRepository $doctrineRepository
    ) {
    }

    public function save(Inbox $inbox): Inbox
    {
        $this->doctrineRepository->getEntityManager()->persist($inbox);

        return $inbox;
    }

    public function findOne(): ?Inbox
    {
        return $this->doctrineRepository->findOneBy([]);
    }
}
