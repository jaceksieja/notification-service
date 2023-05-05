<?php

namespace App\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineRepository extends ServiceEntityRepository
{
    public function getEntityManager(): EntityManagerInterface
    {
        return parent::getEntityManager();
    }
}
