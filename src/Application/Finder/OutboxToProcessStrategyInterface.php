<?php

namespace App\Application\Finder;

use App\Infrastructure\Entity\Outbox;

interface OutboxToProcessStrategyInterface
{
    public function find(): ?Outbox;
}
