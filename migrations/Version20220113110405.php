<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113110405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assurance (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT NOT NULL, compagnie VARCHAR(100) NOT NULL, debut_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', fin_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', montant NUMERIC(6, 2) DEFAULT NULL, INDEX IDX_386829AE4A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assurance ADD CONSTRAINT FK_386829AE4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD circulation_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD ptra INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assurance');
        $this->addSql('ALTER TABLE vehicule DROP circulation_at, DROP ptra');
    }
}
