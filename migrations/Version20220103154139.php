<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220103154139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, immatriculation VARCHAR(10) NOT NULL, longueur NUMERIC(5, 2) DEFAULT NULL, largeur NUMERIC(5, 2) DEFAULT NULL, hauteur NUMERIC(5, 2) DEFAULT NULL, poids_vide NUMERIC(6, 2) DEFAULT NULL, empattement NUMERIC(5, 2) DEFAULT NULL, reservoir INT DEFAULT NULL, energie VARCHAR(20) DEFAULT NULL, co2 NUMERIC(5, 2) DEFAULT NULL, conso_urbaine NUMERIC(5, 2) DEFAULT NULL, conso_mixte NUMERIC(5, 2) DEFAULT NULL, cylindree INT DEFAULT NULL, puissance_din INT DEFAULT NULL, puissance_fiscal INT DEFAULT NULL, transmission VARCHAR(20) DEFAULT NULL, boite_vitesse VARCHAR(20) DEFAULT NULL, nb_vitesse INT DEFAULT NULL, carrosserie VARCHAR(20) DEFAULT NULL, pneumatiques VARCHAR(20) DEFAULT NULL, acheter_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', vendre_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', valeur_achat NUMERIC(10, 2) DEFAULT NULL, marque VARCHAR(20) NOT NULL, modèle VARCHAR(100) DEFAULT NULL, numero_identification VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE vehicule');
    }
}
