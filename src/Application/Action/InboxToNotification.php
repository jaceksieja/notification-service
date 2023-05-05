<?php

namespace App\Application\Action;

use App\Application\Finder\InboxToConsumeStrategyInterface;
use App\Domain\Action\CreateNotification;

readonly class InboxToNotification
{
    public function __construct(
        private InboxToConsumeStrategyInterface $inboxToConsumeStrategy,
        private CreateNotification $createNotification
    ) {
    }

    public function __invoke(): void
    {
        $inboxRecord = $this->inboxToConsumeStrategy->find();

        ($this->createNotification)();
    }
}
