<?php

namespace App\Application\Model;

use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;

readonly class RegisterNotificationDTO
{
    /**
     * @param iterable<Channel> $channels
     */
    public function __construct(
        private Type $type,
        private iterable $channels,
        private string $userIdentifier
    ) {
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getChannels(): iterable
    {
        return $this->channels;
    }

    public function getUserIdentifier(): string
    {
        return $this->userIdentifier;
    }
}
