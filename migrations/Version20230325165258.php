<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325165258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT NOT NULL, vehicule_id INT DEFAULT NULL, carnetdebord_id INT DEFAULT NULL, dat_valide DATE DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, INDEX IDX_BAD4FFFD670C757F (fournisseur_id), INDEX IDX_BAD4FFFD4A4A3511 (vehicule_id), INDEX IDX_BAD4FFFD82F17A8E (carnetdebord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, date_emis DATE DEFAULT NULL, dat_recu DATE DEFAULT NULL, dat_paye DATE DEFAULT NULL, mode_paye VARCHAR(150) DEFAULT NULL, montant_ttc NUMERIC(10, 2) DEFAULT NULL, statut VARCHAR(50) DEFAULT NULL, INDEX IDX_FE866410670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, entretien_type_id INT DEFAULT NULL, nom VARCHAR(150) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(150) DEFAULT NULL, cp VARCHAR(10) DEFAULT NULL, tel VARCHAR(20) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, siret VARCHAR(50) DEFAULT NULL, INDEX IDX_369ECA32B806A5CA (entretien_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD82F17A8E FOREIGN KEY (carnetdebord_id) REFERENCES carnet (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32B806A5CA FOREIGN KEY (entretien_type_id) REFERENCES entretien_type (id)');
        $this->addSql('ALTER TABLE entretien ADD facture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DA7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('CREATE INDEX IDX_2B58D6DA7F2DEE08 ON entretien (facture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien DROP FOREIGN KEY FK_2B58D6DA7F2DEE08');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD670C757F');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD4A4A3511');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD82F17A8E');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410670C757F');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32B806A5CA');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP INDEX IDX_2B58D6DA7F2DEE08 ON entretien');
        $this->addSql('ALTER TABLE entretien DROP facture_id');
    }
}
