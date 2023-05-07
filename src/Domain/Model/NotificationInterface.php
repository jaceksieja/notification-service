<?php

namespace App\Domain\Model;

use App\Domain\Channel\Channel;

interface NotificationInterface
{
    public function getId(): ?string;

    public function getChannel(): Channel;

    public function getUserIdentifier(): string;

    public function processed(): void;
}
