<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230507131953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE outbox (id VARCHAR(255) NOT NULL, notification_id VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, channel VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6AE7D570EF1A9D84 ON outbox (notification_id)');
        $this->addSql('ALTER TABLE outbox ADD CONSTRAINT FK_6AE7D570EF1A9D84 FOREIGN KEY (notification_id) REFERENCES notification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE outbox DROP CONSTRAINT FK_6AE7D570EF1A9D84');
        $this->addSql('DROP TABLE outbox');
    }
}
