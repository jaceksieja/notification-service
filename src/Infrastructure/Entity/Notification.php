<?php

namespace App\Infrastructure\Entity;

use App\Domain\Channel\Channel;
use App\Domain\Notification\Type;
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
    #[ORM\Column(type: 'string', enumType: Type::class)]
    private Type $type;
    #[ORM\Column(type: 'string', enumType: Channel::class)]
    private Channel $channel;
    #[ORM\Column(type: 'string')]
    private string $userIdentifier;
    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;
    #[ORM\Column(type: 'boolean')]
    private bool $processed = false;
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $processedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function isProcessed(): bool
    {
        return $this->processed;
    }

    public function setProcessed(bool $processed): void
    {
        $this->processed = $processed;
    }

    public function getProcessedAt(): ?\DateTimeInterface
    {
        return $this->processedAt;
    }

    public function setProcessedAt(?\DateTimeInterface $processedAt): void
    {
        $this->processedAt = $processedAt;
    }

    public function processed(): void
    {
        $this->processed = true;
        $this->processedAt = new \DateTimeImmutable();
    }
}
