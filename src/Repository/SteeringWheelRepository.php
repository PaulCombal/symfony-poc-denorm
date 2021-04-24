<?php

namespace App\Repository;

use App\Entity\SteeringWheel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SteeringWheel|null find($id, $lockMode = null, $lockVersion = null)
 * @method SteeringWheel|null findOneBy(array $criteria, array $orderBy = null)
 * @method SteeringWheel[]    findAll()
 * @method SteeringWheel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SteeringWheelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SteeringWheel::class);
    }

    // /**
    //  * @return SteeringWheel[] Returns an array of SteeringWheel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SteeringWheel
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
