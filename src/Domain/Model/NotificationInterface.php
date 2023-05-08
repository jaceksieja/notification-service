<?php

namespace App\Domain\Model;

use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;

interface NotificationInterface
{
    public function getId(): ?string;
    public function getType(): Type;
    public function getChannel(): Channel;
    public function getUserIdentifier(): string;
    public function processed(): void;
}
