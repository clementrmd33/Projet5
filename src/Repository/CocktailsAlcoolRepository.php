<?php

namespace App\Repository;

use App\Entity\CocktailsAlcool;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CocktailsAlcool|null find($id, $lockMode = null, $lockVersion = null)
 * @method CocktailsAlcool|null findOneBy(array $criteria, array $orderBy = null)
 * @method CocktailsAlcool[]    findAll()
 * @method CocktailsAlcool[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CocktailsAlcoolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CocktailsAlcool::class);
    }

//    /**
//     * @return CocktailsAlcool[] Returns an array of CocktailsAlcool objects
//     */
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
    public function findOneBySomeField($value): ?CocktailsAlcool
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
