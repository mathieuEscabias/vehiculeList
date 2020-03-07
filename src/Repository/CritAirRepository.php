<?php

namespace App\Repository;

use App\Entity\CritAir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CritAir|null find($id, $lockMode = null, $lockVersion = null)
 * @method CritAir|null findOneBy(array $criteria, array $orderBy = null)
 * @method CritAir[]    findAll()
 * @method CritAir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CritAirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CritAir::class);
    }

    // /**
    //  * @return CritAir[] Returns an array of CritAir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CritAir
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
