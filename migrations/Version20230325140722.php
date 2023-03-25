<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325140722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entretien (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, dat_entretien DATE DEFAULT NULL, km_compteur INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, montant_ttc NUMERIC(7, 2) DEFAULT NULL, date_prochain DATE DEFAULT NULL, observations LONGTEXT DEFAULT NULL, INDEX IDX_2B58D6DA4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entretien_type (id INT AUTO_INCREMENT NOT NULL, entretien_id INT DEFAULT NULL, code VARCHAR(20) NOT NULL, description VARCHAR(150) NOT NULL, periodique TINYINT(1) NOT NULL, frequence VARCHAR(100) DEFAULT NULL, INDEX IDX_55E24EE548DCEA2 (entretien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DA4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE entretien_type ADD CONSTRAINT FK_55E24EE548DCEA2 FOREIGN KEY (entretien_id) REFERENCES entretien (id)');
        $this->addSql('ALTER TABLE sinistre ADD carnetdebord_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sinistre ADD CONSTRAINT FK_F5AC7A6782F17A8E FOREIGN KEY (carnetdebord_id) REFERENCES carnet (id)');
        $this->addSql('CREATE INDEX IDX_F5AC7A6782F17A8E ON sinistre (carnetdebord_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien DROP FOREIGN KEY FK_2B58D6DA4A4A3511');
        $this->addSql('ALTER TABLE entretien_type DROP FOREIGN KEY FK_55E24EE548DCEA2');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE entretien_type');
        $this->addSql('ALTER TABLE sinistre DROP FOREIGN KEY FK_F5AC7A6782F17A8E');
        $this->addSql('DROP INDEX IDX_F5AC7A6782F17A8E ON sinistre');
        $this->addSql('ALTER TABLE sinistre DROP carnetdebord_id');
    }
}
