<?php

namespace App\Repository;

use App\Entity\UserResponses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserResponses>
 *
 * @method UserResponses|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserResponses|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserResponses[]    findAll()
 * @method UserResponses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserResponsesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserResponses::class);
    }

//    /**
//     * @return UserResponses[] Returns an array of UserResponses objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserResponses
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
