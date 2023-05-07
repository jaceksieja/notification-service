<?php

namespace App\Infrastructure\Entity;

use App\Application\Model\OutboxInterface;
use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;
use App\Infrastructure\Repository\OutboxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OutboxRepository::class)]
#[ORM\Table(name: 'outbox')]
class Outbox implements OutboxInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?string $id = null;
    #[ORM\ManyToOne(targetEntity: Notification::class)]
    #[ORM\JoinColumn(name: 'notification_id', referencedColumnName: 'id')]
    private NotificationInterface $notification;
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

    public function getNotification(): NotificationInterface
    {
        return $this->notification;
    }

    public function setNotification(NotificationInterface $notification): void
    {
        $this->notification = $notification;
    }

    public function getChannel(): Channel
    {
        return $this->getNotification()->getChannel();
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
