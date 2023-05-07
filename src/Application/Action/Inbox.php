<?php

namespace App\Application\Action;

use App\Application\Repository\InboxRepositoryInterface;
use App\Infrastructure\Entity\Inbox as InboxRecord;
use App\Infrastructure\Entity\Type;

readonly class Inbox
{
    public function __construct(
        private InboxRepositoryInterface $inboxRepository
    ) {
    }

    public function __invoke(Type $type, array $content): InboxRecord
    {
        $inbox = new InboxRecord();
        $inbox->setType($type);
        $inbox->setContent($content);

        return $this->inboxRepository->save(
            $inbox
        );
    }
}
