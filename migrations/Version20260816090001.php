<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260816090001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Crée la table monthly_statement (suivi mensuel du chiffre d\'affaires)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE monthly_statement (id INT AUTO_INCREMENT NOT NULL, month DATE NOT NULL, revenue NUMERIC(10, 2) NOT NULL, expenses NUMERIC(10, 2) NOT NULL, notes LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX uniq_monthly_statement_month (month), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE monthly_statement');
    }
}
