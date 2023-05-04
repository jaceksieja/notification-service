<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Repository\InboxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InboxRepository::class)]
#[ORM\Table(name: 'inbox')]
class Inbox
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?string $id = null;
    #[ORM\Column(type: 'string', enumType: Type::class)]
    private Type $type;
    #[ORM\Column(type: 'json_document', options: ['jsonb' => true])]
    private string $content;

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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
