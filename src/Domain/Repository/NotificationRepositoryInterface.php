<?php

namespace App\Domain\Repository;

use App\Domain\Model\NotificationInterface;

interface NotificationRepositoryInterface
{
    public function save(NotificationInterface $notification): NotificationInterface;
}
