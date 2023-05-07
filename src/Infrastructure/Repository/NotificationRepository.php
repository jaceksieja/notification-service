<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\NotificationInterface;
use App\Domain\Repository\NotificationRepositoryInterface;

readonly class NotificationRepository implements NotificationRepositoryInterface
{
    public function __construct(
        private DoctrineRepository $doctrineRepository
    ) {
    }

    public function save(NotificationInterface $notification): NotificationInterface
    {
        $this->doctrineRepository->getEntityManager()->persist($notification);

        return $notification;
    }

    public function findOne(): ?NotificationInterface
    {
        return $this->doctrineRepository->findOneBy([]);
    }
}
