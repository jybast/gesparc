<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324204953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carnet ADD conducteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE carnet ADD CONSTRAINT FK_576D2650F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_576D2650F16F4AC6 ON carnet (conducteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carnet DROP FOREIGN KEY FK_576D2650F16F4AC6');
        $this->addSql('DROP INDEX IDX_576D2650F16F4AC6 ON carnet');
        $this->addSql('ALTER TABLE carnet DROP conducteur_id');
    }
}
