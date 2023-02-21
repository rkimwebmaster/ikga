<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220161816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, photo295x320 VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE news (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, date_publication DATETIME NOT NULL, photo960x510 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE page (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL)');
        $this->addSql('CREATE TABLE parametre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, newsbg389x454 VARCHAR(255) DEFAULT NULL, menu_banner295x320_premier VARCHAR(255) DEFAULT NULL, menu_banner295x320_deuxieme VARCHAR(255) DEFAULT NULL, menu_banner295x320_troisieme VARCHAR(255) DEFAULT NULL, main_banner1903x650_un VARCHAR(255) DEFAULT NULL, main_banner1903x650_deux VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE partenaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, photo214x140_png VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE privacy (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE produit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, photo624x800_premier VARCHAR(255) NOT NULL, photo624x800_deuxieme VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
        $this->addSql('CREATE TABLE qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL)');
        $this->addSql('CREATE TABLE subscribe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE team_member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_complet VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, photo390x390 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE parametre');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE privacy');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE qsn');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE subscribe');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
