<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325104253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE energie (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(5) NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carnet ADD energie_type_id INT DEFAULT NULL, ADD energie_volume NUMERIC(5, 2) NOT NULL, ADD energie_ttc NUMERIC(6, 2) NOT NULL, ADD cout_unite NUMERIC(5, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE carnet ADD CONSTRAINT FK_576D2650AC4E8E6D FOREIGN KEY (energie_type_id) REFERENCES energie (id)');
        $this->addSql('CREATE INDEX IDX_576D2650AC4E8E6D ON carnet (energie_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carnet DROP FOREIGN KEY FK_576D2650AC4E8E6D');
        $this->addSql('DROP TABLE energie');
        $this->addSql('DROP INDEX IDX_576D2650AC4E8E6D ON carnet');
        $this->addSql('ALTER TABLE carnet DROP energie_type_id, DROP energie_volume, DROP energie_ttc, DROP cout_unite');
    }
}
