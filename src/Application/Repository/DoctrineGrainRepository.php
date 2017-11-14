<?php

namespace Beeriously\Application\Repository;

use Beeriously\Domain\Ingredients\Grains\Grain;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class DoctrineGrainRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        /** @var EntityManager $em */
        parent::__construct($em,$em->getClassMetadata(Grain::class));
    }


}