<?php

namespace App\Repository;

use App\Entity\ImageAnimaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageAnimaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageAnimaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageAnimaux[]    findAll()
 * @method ImageAnimaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageAnimauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageAnimaux::class);
    }

    // /**
    //  * @return ImageAnimaux[] Returns an array of ImageAnimaux objects
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
    public function findOneBySomeField($value): ?ImageAnimaux
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
