<?php

namespace App\Domain\Action;

use App\Domain\Channel\Channel;
use App\Domain\Model\Notification;
use App\Domain\Notification\Type;
use App\Domain\Repository\NotificationRepositoryInterface;
use App\Infrastructure\Factory\NotificationFactory;

readonly class CreateNotification
{
    public function __construct(
        private NotificationRepositoryInterface $notificationRepository,
        private NotificationFactory $notificationFactory
    ) {
    }

    public function __invoke(Type $type, Channel $channel, string $userIdentifier): Notification
    {
        $notification = $this->notificationFactory->create($type, $channel, $userIdentifier);

        $this->notificationRepository->save($notification);

        return $notification;
    }
}
