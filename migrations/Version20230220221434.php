<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220221434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__categorie AS SELECT id, designation, description, photo295x320 FROM categorie');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo295x320 VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO categorie (id, designation, description, photo295x320) SELECT id, designation, description, photo295x320 FROM __temp__categorie');
        $this->addSql('DROP TABLE __temp__categorie');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD COLUMN photo VARCHAR(255) DEFAULT NULL');
    }
}
