<?php

namespace App\Application\Channel\Sender;

use App\Application\Repository\OutboxRepositoryInterface;
use App\Domain\Channel\Channel;
use App\Domain\Channel\Sender\SenderInterface;
use App\Domain\Model\NotificationInterface;
use App\Infrastructure\Entity\Outbox;

readonly class OutboxSender implements SenderInterface
{
    public function __construct(
        private OutboxRepositoryInterface $outboxRepository
    ) {
    }

    public function send(Channel $channel, NotificationInterface $notification): void
    {
        $outbox = new Outbox();
        $outbox->setNotification($notification);

        $this->outboxRepository->save($outbox);
    }
}
