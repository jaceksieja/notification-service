<?php

namespace App\Application\Repository;

use App\Infrastructure\Entity\Outbox;

interface OutboxRepositoryInterface
{
    public function save(Outbox $outbox): Outbox;

    public function findOne(): ?Outbox;
}
