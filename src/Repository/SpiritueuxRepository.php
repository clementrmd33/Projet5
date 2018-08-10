<?php

namespace App\Repository;

use App\Entity\Spiritueux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Spiritueux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Spiritueux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Spiritueux[]    findAll()
 * @method Spiritueux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpiritueuxRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Spiritueux::class);
    }

//    /**
//     * @return Spiritueux[] Returns an array of Spiritueux objects
//     */
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
    public function findOneBySomeField($value): ?Spiritueux
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
