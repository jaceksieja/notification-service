<?php

namespace App\Domain\Finder;

use App\Domain\Model\NotificationInterface;
use App\Domain\Repository\NotificationRepositoryInterface;

readonly class PickFirstStrategy implements PickNotificationStrategyInterface
{
    public function __construct(
        private NotificationRepositoryInterface $notificationRepository
    ) {
    }

    public function pick(): ?NotificationInterface
    {
        return $this->notificationRepository->findOne();
    }
}
