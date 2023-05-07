<?php

namespace App\Application\Model;

use App\Domain\Channel\Channel;

class RegisterNotificationDTO
{
    /**
     * @param iterable<Channel> $channels
     */
    public function __construct(
        private iterable $channels,
        private string $userIdentifier
    ) {
    }

    public function getChannels(): iterable
    {
        return $this->channels;
    }

    public function setChannels(iterable $channels): void
    {
        $this->channels = $channels;
    }

    public function getUserIdentifier(): string
    {
        return $this->userIdentifier;
    }

    public function setUserIdentifier(string $userIdentifier): void
    {
        $this->userIdentifier = $userIdentifier;
    }

    public function getContent(): array
    {
        return [];
    }
}
