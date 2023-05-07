<?php

namespace App\Application\Finder;

use App\Application\Model\InboxInterface;

interface InboxToConsumeStrategyInterface
{
    public function find(): ?InboxInterface;
}
