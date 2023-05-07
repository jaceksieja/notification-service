<?php

namespace App\Application\Finder;

use App\Application\Model\OutboxInterface;

interface OutboxToProcessStrategyInterface
{
    public function find(): ?OutboxInterface;
}
