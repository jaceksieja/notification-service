<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Inbox;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class InboxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inbox::class);
    }

    public function save(Inbox $inbox): Inbox
    {
        $this->_em->persist($inbox);

        return $inbox;
    }
}
