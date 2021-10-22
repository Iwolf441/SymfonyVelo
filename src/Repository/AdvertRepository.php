<?php

namespace App\Repository;

use App\Entity\Advert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Advert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advert[]    findAll()
 * @method Advert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Advert::class);
    }

    public function findById($id): Advert {

        $qb = $this->createQueryBuilder('a')
            ->where('a.id= :id')
            ->setParameter('id',$id)
            ;
        return $qb->getQuery()->getOneOrNullResult();
    }

    public function findAllWithCategories()
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.category','c')
            ->addSelect('c');

        return $qb->getQuery()->getResult();
    }
}
