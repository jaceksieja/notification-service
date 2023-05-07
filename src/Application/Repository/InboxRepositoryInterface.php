<?php

namespace App\Application\Repository;

use App\Application\Model\InboxInterface;

interface InboxRepositoryInterface
{
    public function save(InboxInterface $inbox): InboxInterface;

    public function findOne(): ?InboxInterface;
}
