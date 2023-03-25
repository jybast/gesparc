<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325110051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contravention (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, conducteur_id INT DEFAULT NULL, carnetdebord_id INT DEFAULT NULL, dat_pv DATE NOT NULL, montant INT NOT NULL, INDEX IDX_C3289E464A4A3511 (vehicule_id), INDEX IDX_C3289E46F16F4AC6 (conducteur_id), INDEX IDX_C3289E4682F17A8E (carnetdebord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contravention ADD CONSTRAINT FK_C3289E464A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE contravention ADD CONSTRAINT FK_C3289E46F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contravention ADD CONSTRAINT FK_C3289E4682F17A8E FOREIGN KEY (carnetdebord_id) REFERENCES carnet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contravention DROP FOREIGN KEY FK_C3289E464A4A3511');
        $this->addSql('ALTER TABLE contravention DROP FOREIGN KEY FK_C3289E46F16F4AC6');
        $this->addSql('ALTER TABLE contravention DROP FOREIGN KEY FK_C3289E4682F17A8E');
        $this->addSql('DROP TABLE contravention');
    }
}
