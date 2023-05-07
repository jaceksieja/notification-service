<?php

namespace App\Domain\Model;

abstract class Notification implements NotificationInterface
{
    public function getId(): ?string
    {
        return null;
    }
}
