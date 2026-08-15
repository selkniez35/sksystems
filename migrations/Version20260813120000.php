<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260813120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Crée la table project (propositions de projets clients)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(150) NOT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, contact_email VARCHAR(180) NOT NULL, budget VARCHAR(100) DEFAULT NULL, status VARCHAR(20) NOT NULL, moderation_token VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL, published_at DATETIME DEFAULT NULL, UNIQUE INDEX uniq_project_moderation_token (moderation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE project');
    }
}
