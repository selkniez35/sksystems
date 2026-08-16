<?php

namespace App\Repository;

use App\Entity\MonthlyStatement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MonthlyStatement>
 */
class MonthlyStatementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonthlyStatement::class);
    }

    /**
     * @return MonthlyStatement[]
     */
    public function findAllOrderedByMonth(): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.month', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return MonthlyStatement[]
     */
    public function findBetween(\DateTimeImmutable $from, \DateTimeImmutable $to): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.month BETWEEN :from AND :to')
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->orderBy('s.month', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findOneByMonth(\DateTimeImmutable $month): ?MonthlyStatement
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.month = :month')
            ->setParameter('month', $month->modify('first day of this month')->setTime(0, 0))
            ->getQuery()
            ->getOneOrNullResult();
    }
}
