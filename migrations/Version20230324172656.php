<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324172656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carnet (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, lieu_depart VARCHAR(100) NOT NULL, lieu_retour VARCHAR(50) DEFAULT NULL, itineraire VARCHAR(255) DEFAULT NULL, dat_mission DATE NOT NULL, heure_depart TIME NOT NULL, heure_retour TIME NOT NULL, km_compteur_retour INT NOT NULL, observations LONGTEXT DEFAULT NULL, INDEX IDX_576D26504A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carnet ADD CONSTRAINT FK_576D26504A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE user ADD carnetdebord_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64982F17A8E FOREIGN KEY (carnetdebord_id) REFERENCES carnet (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64982F17A8E ON user (carnetdebord_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64982F17A8E');
        $this->addSql('ALTER TABLE carnet DROP FOREIGN KEY FK_576D26504A4A3511');
        $this->addSql('DROP TABLE carnet');
        $this->addSql('DROP INDEX IDX_8D93D64982F17A8E ON user');
        $this->addSql('ALTER TABLE user DROP carnetdebord_id');
    }
}
