<?php

namespace App\Repository;

use App\Entity\Sublevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sublevel>
 *
 * @method Sublevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sublevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sublevel[]    findAll()
 * @method Sublevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SublevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sublevel::class);
    }

    //    /**
    //     * @return Sublevel[] Returns an array of Sublevel objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Sublevel
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
