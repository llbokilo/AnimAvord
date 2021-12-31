<?php

namespace App\Repository;

use App\Entity\LoterieParticipant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoterieParticipant|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoterieParticipant|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoterieParticipant[]    findAll()
 * @method LoterieParticipant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoterieParticipantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoterieParticipant::class);
    }

    // /**
    //  * @return LoterieParticipant[] Returns an array of LoterieParticipant objects
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
    public function findOneBySomeField($value): ?LoterieParticipant
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
