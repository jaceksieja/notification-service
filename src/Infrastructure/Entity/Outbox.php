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
    #[ORM\Column(type: 'string', enumType: Type::class)]
    private Type $type;
    #[ORM\ManyToOne(targetEntity: Notification::class)]
    #[ORM\JoinColumn(name: 'notification_id', referencedColumnName: 'id')]
    private NotificationInterface $notification;
    #[ORM\Column(type: 'string', enumType: Channel::class)]
    private Channel $channel;

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
        return $this->channel;
    }

    public function setChannel(Channel $channel): void
    {
        $this->channel = $channel;
    }
}
