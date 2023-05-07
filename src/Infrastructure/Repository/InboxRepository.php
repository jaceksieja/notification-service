<?php

namespace App\Infrastructure\Repository;

use App\Application\Model\InboxInterface;
use App\Application\Repository\InboxRepositoryInterface;

readonly class InboxRepository implements InboxRepositoryInterface
{
    public function __construct(
        private DoctrineRepository $doctrineRepository
    ) {
    }

    public function save(InboxInterface $inbox): InboxInterface
    {
        $this->doctrineRepository->getEntityManager()->persist($inbox);

        return $inbox;
    }

    public function findOne(): ?InboxInterface
    {
        return $this->doctrineRepository->findOneBy(['processed' => false]);
    }
}
