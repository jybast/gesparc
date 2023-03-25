<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325110707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contravention_type (id INT AUTO_INCREMENT NOT NULL, contravention_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, retrait_points INT DEFAULT NULL, retrait_pc TINYINT(1) DEFAULT NULL, INDEX IDX_8D5E8F99C8213BEF (contravention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contravention_type ADD CONSTRAINT FK_8D5E8F99C8213BEF FOREIGN KEY (contravention_id) REFERENCES contravention (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contravention_type DROP FOREIGN KEY FK_8D5E8F99C8213BEF');
        $this->addSql('DROP TABLE contravention_type');
    }
}
