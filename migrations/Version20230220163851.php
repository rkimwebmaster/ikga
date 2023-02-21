<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220163851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__page AS SELECT id, titre, description, contenu FROM page');
        $this->addSql('DROP TABLE page');
        $this->addSql('CREATE TABLE page (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL)');
        $this->addSql('INSERT INTO page (id, titre, description, contenu) SELECT id, titre, description, contenu FROM __temp__page');
        $this->addSql('DROP TABLE __temp__page');
        $this->addSql('CREATE TEMPORARY TABLE __temp__service AS SELECT id, titre, description, contenu FROM service');
        $this->addSql('DROP TABLE service');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL)');
        $this->addSql('INSERT INTO service (id, titre, description, contenu) SELECT id, titre, description, contenu FROM __temp__service');
        $this->addSql('DROP TABLE __temp__service');
    }
}
