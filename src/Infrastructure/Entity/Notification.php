<?php

namespace App\Infrastructure\Entity;

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

    public function getId(): ?string
    {
        return $this->id;
    }
}
