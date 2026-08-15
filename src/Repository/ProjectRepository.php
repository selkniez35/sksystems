<?php

namespace App\Repository;

use App\Entity\Project;
use App\Entity\ProjectStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Project>
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * @return Project[]
     */
    public function findPublished(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.status = :status')
            ->setParameter('status', ProjectStatus::Published)
            ->orderBy('p.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findOneByModerationToken(int $id, string $token): ?Project
    {
        return $this->findOneBy(['id' => $id, 'moderationToken' => $token]);
    }
}
