<?php

namespace App\Repository;

use App\Entity\OccupiedRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OccupiedRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method OccupiedRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method OccupiedRoom[]    findAll()
 * @method OccupiedRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OccupiedRoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OccupiedRoom::class);
    }

    // /**
    //  * @return OOccupiedRoom[] Returns an array of OOccupiedRoom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OOccupiedRoom
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
