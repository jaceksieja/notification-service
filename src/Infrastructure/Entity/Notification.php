<?php

namespace App\Infrastructure\Entity;

use App\Domain\Channel\Channel;
use App\Infrastructure\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ORM\Table(name: 'notification')]
class Notification extends \App\Domain\Model\Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?string $id = null;
    #[ORM\Column(type: 'string', enumType: Channel::class)]
    private Channel $channel;
    #[ORM\Column(type: 'string')]
    private string $userIdentifier;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): void
    {
        $this->channel = $channel;
    }

    public function getUserIdentifier(): string
    {
        return $this->userIdentifier;
    }

    public function setUserIdentifier(string $userIdentifier): void
    {
        $this->userIdentifier = $userIdentifier;
    }
}
