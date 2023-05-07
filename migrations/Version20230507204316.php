<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230507204316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inbox ADD user_identifier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inbox DROP content');
        $this->addSql('ALTER TABLE inbox RENAME COLUMN type TO channel');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE inbox ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inbox ADD content JSON NOT NULL');
        $this->addSql('ALTER TABLE inbox DROP channel');
        $this->addSql('ALTER TABLE inbox DROP user_identifier');
        $this->addSql('COMMENT ON COLUMN inbox.content IS \'(DC2Type:json_document)\'');
    }
}
