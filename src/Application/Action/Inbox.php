<?php

namespace App\Application\Action;

use App\Infrastructure\Entity\Inbox as InboxRecord;
use App\Infrastructure\Entity\Type;
use App\Infrastructure\Repository\InboxRepository;

readonly class Inbox
{
    public function __construct(
        private InboxRepository $inboxRepository
    ) {
    }

    public function __invoke(Type $type, string $content): InboxRecord
    {
        $inbox = new InboxRecord();
        $inbox->setType($type);
        $inbox->setContent($content);

        return $this->inboxRepository->save(
            $inbox
        );
    }
}
