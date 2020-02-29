<?php

namespace App\Repository;

use App\Entity\CompoRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CompoRecette|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompoRecette|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompoRecette[]    findAll()
 * @method CompoRecette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompoRecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompoRecette::class);
    }

    // /**
    //  * @return CompoRecette[] Returns an array of CompoRecette objects
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
    public function findOneBySomeField($value): ?CompoRecette
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
