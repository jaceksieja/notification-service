<?php

namespace App\Application\Finder;

use App\Infrastructure\Entity\Inbox;

interface InboxToConsumeStrategyInterface
{
    public function find(): ?Inbox;
}
