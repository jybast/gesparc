<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324171335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD dat_naissance DATE DEFAULT NULL, ADD num_pc VARCHAR(50) DEFAULT NULL, ADD nb_points INT DEFAULT NULL, ADD cat_pc VARCHAR(20) DEFAULT NULL, ADD valid_pc TINYINT(1) DEFAULT NULL, ADD cat_caces VARCHAR(50) DEFAULT NULL, ADD dat_pc DATE DEFAULT NULL, ADD dat_caces DATE DEFAULT NULL, ADD valid_caces TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP dat_naissance, DROP num_pc, DROP nb_points, DROP cat_pc, DROP valid_pc, DROP cat_caces, DROP dat_pc, DROP dat_caces, DROP valid_caces');
    }
}
