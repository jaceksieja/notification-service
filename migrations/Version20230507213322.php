<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230507213322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inbox ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE inbox ADD processed BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE inbox ADD processed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE notification ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE notification ADD processed BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE notification ADD processed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE outbox ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE outbox ADD processed BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE outbox ADD processed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE inbox DROP created_at');
        $this->addSql('ALTER TABLE inbox DROP processed');
        $this->addSql('ALTER TABLE inbox DROP processed_at');
        $this->addSql('ALTER TABLE outbox DROP created_at');
        $this->addSql('ALTER TABLE outbox DROP processed');
        $this->addSql('ALTER TABLE outbox DROP processed_at');
        $this->addSql('ALTER TABLE notification DROP created_at');
        $this->addSql('ALTER TABLE notification DROP processed');
        $this->addSql('ALTER TABLE notification DROP processed_at');
    }
}
