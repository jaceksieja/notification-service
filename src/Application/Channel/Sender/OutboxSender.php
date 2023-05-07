<?php

namespace App\Application\Channel\Sender;

use App\Application\Factory\OutboxFactoryInterface;
use App\Application\Repository\OutboxRepositoryInterface;
use App\Domain\Channel\Channel;
use App\Domain\Channel\Sender\SenderInterface;
use App\Domain\Model\NotificationInterface;

readonly class OutboxSender implements SenderInterface
{
    public function __construct(
        private OutboxRepositoryInterface $outboxRepository,
        private OutboxFactoryInterface $outboxFactory
    ) {
    }

    public function send(Channel $channel, NotificationInterface $notification): void
    {
        $this->outboxRepository->save(
            $this->outboxFactory->create($notification)
        );
    }
}
