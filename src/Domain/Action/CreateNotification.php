<?php

namespace App\Domain\Action;

use App\Domain\Model\Notification;
use App\Domain\Repository\NotificationRepositoryInterface;
use App\Infrastructure\Factory\NotificationFactory;

readonly class CreateNotification
{
    public function __construct(
        private NotificationRepositoryInterface $notificationRepository,
        private NotificationFactory $notificationFactory
    ) {
    }

    public function __invoke(): Notification
    {
        $notification = $this->notificationFactory->create();

        $this->notificationRepository->save($notification);

        return $notification;
    }
}
