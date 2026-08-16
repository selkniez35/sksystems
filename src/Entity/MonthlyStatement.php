<?php

namespace App\Entity;

use App\Repository\MonthlyStatementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: MonthlyStatementRepository::class)]
#[ORM\Table(name: 'monthly_statement')]
#[ORM\UniqueConstraint(name: 'uniq_monthly_statement_month', columns: ['month'])]
#[UniqueEntity(fields: ['month'], message: 'Une saisie existe déjà pour ce mois.')]
class MonthlyStatement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeImmutable $month;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $revenue = '0.00';

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private string $expenses = '0.00';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->month = new \DateTimeImmutable('first day of this month');
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonth(): \DateTimeImmutable
    {
        return $this->month;
    }

    public function setMonth(\DateTimeImmutable $month): static
    {
        $this->month = $month->modify('first day of this month')->setTime(0, 0);

        return $this;
    }

    public function getRevenue(): string
    {
        return $this->revenue;
    }

    public function setRevenue(string $revenue): static
    {
        $this->revenue = $revenue;

        return $this;
    }

    public function getExpenses(): string
    {
        return $this->expenses;
    }

    public function setExpenses(string $expenses): static
    {
        $this->expenses = $expenses;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getNetProfit(): float
    {
        return (float) $this->revenue - (float) $this->expenses;
    }
}
