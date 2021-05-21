<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210516103809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_accessoire ADD accessoire_id INT NOT NULL');
        $this->addSql('ALTER TABLE image_accessoire ADD CONSTRAINT FK_6423155CD23B67ED FOREIGN KEY (accessoire_id) REFERENCES accessoire (id)');
        $this->addSql('CREATE INDEX IDX_6423155CD23B67ED ON image_accessoire (accessoire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_accessoire DROP FOREIGN KEY FK_6423155CD23B67ED');
        $this->addSql('DROP INDEX IDX_6423155CD23B67ED ON image_accessoire');
        $this->addSql('ALTER TABLE image_accessoire DROP accessoire_id');
    }
}
