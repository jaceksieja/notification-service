<?php

namespace App\Infrastructure\Entity;

use App\Domain\Channel\Channel;
use App\Domain\Model\NotificationInterface;
use App\Infrastructure\Repository\OutboxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OutboxRepository::class)]
#[ORM\Table(name: 'outbox')]
class Outbox
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?string $id = null;
    #[ORM\ManyToOne(targetEntity: Notification::class)]
    #[ORM\JoinColumn(name: 'notification_id', referencedColumnName: 'id')]
    private NotificationInterface $notification;

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
}
