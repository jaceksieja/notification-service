<?php

namespace App\Application\Repository;

use App\Infrastructure\Entity\Inbox;

interface InboxRepositoryInterface
{
    public function save(Inbox $inbox): Inbox;

    public function findOne(): ?Inbox;
}
