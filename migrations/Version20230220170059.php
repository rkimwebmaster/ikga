<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220170059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE qsn ADD COLUMN titre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE qsn ADD COLUMN description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE qsn ADD COLUMN contenu CLOB NOT NULL');
        $this->addSql('ALTER TABLE qsn ADD COLUMN photo1170x500 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__qsn AS SELECT id FROM qsn');
        $this->addSql('DROP TABLE qsn');
        $this->addSql('CREATE TABLE qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO qsn (id) SELECT id FROM __temp__qsn');
        $this->addSql('DROP TABLE __temp__qsn');
    }
}
