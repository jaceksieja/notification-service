<?php

namespace App\Application\Repository;

use App\Application\Model\OutboxInterface;

interface OutboxRepositoryInterface
{
    public function save(OutboxInterface $outbox): OutboxInterface;

    public function findOne(): ?OutboxInterface;
}
