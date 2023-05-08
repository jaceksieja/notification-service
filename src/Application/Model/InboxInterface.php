<?php

namespace App\Application\Model;

use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;

interface InboxInterface
{
    public function getChannel(): Channel;
    public function getType(): Type;
    public function getUserIdentifier(): string;
    public function processed(): void;
}
