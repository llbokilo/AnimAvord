<?php

namespace App\Repository;

use App\Entity\HistoActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoActivite[]    findAll()
 * @method HistoActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoActivite::class);
    }

    // /**
    //  * @return HistoActivite[] Returns an array of HistoActivite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoActivite
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
