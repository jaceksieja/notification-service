<?php

namespace App\Application\Model;

use App\Domain\Channel\Channel;

interface InboxInterface
{
    public function getChannel(): Channel;

    public function getUserIdentifier(): string;

    public function processed(): void;
}
