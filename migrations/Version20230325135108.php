<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325135108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sinistre (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, conducteur_id INT DEFAULT NULL, dat_sinistre DATE NOT NULL, lieu_sinistre VARCHAR(255) DEFAULT NULL, circonstances LONGTEXT DEFAULT NULL, materiel TINYINT(1) DEFAULT NULL, corporel TINYINT(1) DEFAULT NULL, blesses INT DEFAULT NULL, tues INT DEFAULT NULL, responsable TINYINT(1) DEFAULT NULL, pv_police TINYINT(1) DEFAULT NULL, date_pv DATE DEFAULT NULL, unite_police VARCHAR(150) DEFAULT NULL, expertise TINYINT(1) DEFAULT NULL, date_expertise DATE DEFAULT NULL, observations LONGTEXT DEFAULT NULL, INDEX IDX_F5AC7A674A4A3511 (vehicule_id), INDEX IDX_F5AC7A67F16F4AC6 (conducteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sinistre ADD CONSTRAINT FK_F5AC7A674A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE sinistre ADD CONSTRAINT FK_F5AC7A67F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sinistre DROP FOREIGN KEY FK_F5AC7A674A4A3511');
        $this->addSql('ALTER TABLE sinistre DROP FOREIGN KEY FK_F5AC7A67F16F4AC6');
        $this->addSql('DROP TABLE sinistre');
    }
}
