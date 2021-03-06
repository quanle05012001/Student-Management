<?php

namespace App\Repository;

use App\Entity\Major;
use Doctrine\ORM\ORMException;
use App\Repository\MajorRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Major>
 *
 * @method Major|null find($id, $lockMode = null, $lockVersion = null)
 * @method Major|null findOneBy(array $criteria, array $orderBy = null)
 * @method Major[]    findAll()
 * @method Major[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MajorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Major::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Major $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Major $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Major[] Returns an array of Major objects
    //  */
    /*
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
    */

    /*
     * @return Major[]
    */
    public function search ($keyword)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.name LIKE :keyword')
            ->setParameter('keyword','%'.$keyword.'%')
            ->orderBy('m.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
}