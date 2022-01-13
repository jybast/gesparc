<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113151746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, immatriculation VARCHAR(10) NOT NULL, immatriculation_at DATE NOT NULL, titulaire1 VARCHAR(255) NOT NULL, titulaire2 VARCHAR(255) DEFAULT NULL, titulaire_adresse VARCHAR(255) NOT NULL, marque VARCHAR(100) NOT NULL, version VARCHAR(100) DEFAULT NULL, d21_codecni VARCHAR(50) DEFAULT NULL, d3_commerial VARCHAR(50) DEFAULT NULL, numero_vin VARCHAR(50) NOT NULL, f1_ptac INT DEFAULT NULL, f3_ptra INT DEFAULT NULL, g1_poidsvide INT DEFAULT NULL, i_certificat_at DATE NOT NULL, j1_genre VARCHAR(10) DEFAULT NULL, j2_carrosserie VARCHAR(10) DEFAULT NULL, j3_nat VARCHAR(10) DEFAULT NULL, k_reception VARCHAR(50) DEFAULT NULL, p1_cylindree INT DEFAULT NULL, p2_kw INT DEFAULT NULL, p3_energie VARCHAR(50) DEFAULT NULL, p6_cv INT DEFAULT NULL, s1_assis INT DEFAULT NULL, s2_debout INT DEFAULT NULL, u1_db INT DEFAULT NULL, u2_moteur INT DEFAULT NULL, v7_co2 INT DEFAULT NULL, v9_cee VARCHAR(50) DEFAULT NULL, controle_at DATE NOT NULL, longueur NUMERIC(5, 2) DEFAULT NULL, largeur NUMERIC(5, 2) DEFAULT NULL, hauteur NUMERIC(5, 2) DEFAULT NULL, transmission VARCHAR(50) DEFAULT NULL, boite VARCHAR(50) DEFAULT NULL, nbvitesse INT DEFAULT NULL, couleur VARCHAR(50) DEFAULT NULL, reservoir INT DEFAULT NULL, conso_urbaine NUMERIC(5, 2) DEFAULT NULL, conso_mixte NUMERIC(5, 2) DEFAULT NULL, achat_at DATE DEFAULT NULL, vente_at DATE DEFAULT NULL, valeur NUMERIC(6, 2) DEFAULT NULL, pneumatiques VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicule');
    }
}
