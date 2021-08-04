<?php

namespace App\Repository;

use App\Entity\ReservedRoom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReservedRoom|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservedRoom|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservedRoom[]    findAll()
 * @method ReservedRoom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservedRoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservedRoom::class);
    }

    // /**
    //  * @return ReseReservedRoom[] Returns an array of ReseReservedRoom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReseReservedRoom
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
