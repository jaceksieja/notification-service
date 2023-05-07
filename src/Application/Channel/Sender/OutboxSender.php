<?php

namespace App\Application\Channel\Sender;

use App\Application\Repository\OutboxRepositoryInterface;
use App\Domain\Channel\Channel;
use App\Domain\Channel\Sender\SenderInterface;
use App\Domain\Model\NotificationInterface;
use App\Infrastructure\Entity\Outbox;
use App\Infrastructure\Entity\Type;

readonly class OutboxSender implements SenderInterface
{
    public function __construct(
        private OutboxRepositoryInterface $outboxRepository
    ) {
    }

    public function send(Channel $channel, NotificationInterface $notification): void
    {
        $outbox = new Outbox();
        $outbox->setType(Type::NOTIFICATION);
        $outbox->setNotification($notification);
        $outbox->setChannel($channel);

        $this->outboxRepository->save($outbox);
    }
}
