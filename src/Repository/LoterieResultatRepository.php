<?php

namespace App\Repository;

use App\Entity\LoterieResultat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoterieResultat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoterieResultat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoterieResultat[]    findAll()
 * @method LoterieResultat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoterieResultatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoterieResultat::class);
    }

    // /**
    //  * @return LoterieResultat[] Returns an array of LoterieResultat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoterieResultat
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
