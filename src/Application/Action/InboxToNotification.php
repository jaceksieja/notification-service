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
        $inbox = $this->inboxToConsumeStrategy->find();

        if (null === $inbox) {
            // @todo logging
            return;
        }

        ($this->createNotification)($inbox->getChannel(), $inbox->getUserIdentifier());
    }
}
