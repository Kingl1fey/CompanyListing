<?php

namespace App\Repository;

use App\Entity\CompanyHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyHistory[]    findAll()
 * @method CompanyHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyHistory::class);
    }

    // /**
    //  * @return CompanyHistory[] Returns an array of CompanyHistory objects
    //  */

    public function findByDate($id, $date)
    {
        $query = $this->createQueryBuilder('ch')
            ->andWhere('ch.company = :val')
            ->andWhere('ch.updatedAt <= :date')
            ->setParameter('val', $id)
            ->setParameter('date', $date)
            ->orderBy('ch.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return $query;
    }


    /*
    public function findOneBySomeField($value): ?CompanyHistory
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
