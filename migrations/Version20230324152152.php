<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324152152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, a_immatriculation VARCHAR(10) NOT NULL, b_pmc DATE NOT NULL, c1_titulaire VARCHAR(255) NOT NULL, c4_adresse VARCHAR(255) NOT NULL, d1_marque VARCHAR(50) NOT NULL, d2_version VARCHAR(50) DEFAULT NULL, d21_cnit VARCHAR(50) DEFAULT NULL, d3_commercial VARCHAR(50) DEFAULT NULL, e_vin VARCHAR(50) NOT NULL, f1_ptac INT NOT NULL, f2_masse INT DEFAULT NULL, f3_ptra INT DEFAULT NULL, g1_poidsvide INT DEFAULT NULL, h_validite DATE DEFAULT NULL, i_datcertificat DATE NOT NULL, j1_genre VARCHAR(20) DEFAULT NULL, j2_carrosserie_ce VARCHAR(20) DEFAULT NULL, j3_carrosserie VARCHAR(20) DEFAULT NULL, k_reception VARCHAR(50) DEFAULT NULL, p1_cylindree INT DEFAULT NULL, p2_puissance INT DEFAULT NULL, p3_energie VARCHAR(20) NOT NULL, p6_fiscal INT NOT NULL, s1_assis INT DEFAULT NULL, s2_debout INT DEFAULT NULL, u1_db INT DEFAULT NULL, v7_co2 INT DEFAULT NULL, v9_classe VARCHAR(50) DEFAULT NULL, dat_entree_parc DATE NOT NULL, dat_sortie_parc DATE DEFAULT NULL, valeur_achat NUMERIC(10, 2) DEFAULT NULL, mode_achat VARCHAR(50) DEFAULT NULL, etat_achat VARCHAR(50) DEFAULT NULL, compteur_achat INT NOT NULL, compteur_actuel INT NOT NULL, dat_compteur_actuel DATE NOT NULL, conso_theorique NUMERIC(5, 2) DEFAULT NULL, conso_reel NUMERIC(5, 2) NOT NULL, pneus VARCHAR(50) DEFAULT NULL, veh_long NUMERIC(5, 2) DEFAULT NULL, veh_large NUMERIC(5, 2) DEFAULT NULL, veh_haut NUMERIC(5, 2) DEFAULT NULL, dat_cont_tech DATE NOT NULL, dat_cont_frigo DATE DEFAULT NULL, cat_pc VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicule');
    }
}
