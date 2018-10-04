<?php

namespace App\Repository;

use App\Entity\Magico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Magico|null find($id, $lockMode = null, $lockVersion = null)
 * @method Magico|null findOneBy(array $criteria, array $orderBy = null)
 * @method Magico[]    findAll()
 * @method Magico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MagicoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Magico::class);
    }

    /**
     * @param $value
     *
     * @return Magico[] Returns an array of Magico objects
     */

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param $value
     *
     * @return Magico|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneBySomeField($value): ?Magico
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
