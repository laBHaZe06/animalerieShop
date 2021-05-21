<?php

namespace App\Repository;

use App\Entity\ImageAccessoire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageAccessoire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageAccessoire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageAccessoire[]    findAll()
 * @method ImageAccessoire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageAccessoireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageAccessoire::class);
    }

    // /**
    //  * @return ImageAccessoire[] Returns an array of ImageAccessoire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageAccessoire
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
