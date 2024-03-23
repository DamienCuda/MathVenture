<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240323132729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sublevel ADD COLUMN sublevelorder INTEGER DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__sublevel AS SELECT id, parent_level_id, name, slug FROM sublevel');
        $this->addSql('DROP TABLE sublevel');
        $this->addSql('CREATE TABLE sublevel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parent_level_id INTEGER NOT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(255) NOT NULL, CONSTRAINT FK_E05923C9C07CE776 FOREIGN KEY (parent_level_id) REFERENCES level (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sublevel (id, parent_level_id, name, slug) SELECT id, parent_level_id, name, slug FROM __temp__sublevel');
        $this->addSql('DROP TABLE __temp__sublevel');
        $this->addSql('CREATE INDEX IDX_E05923C9C07CE776 ON sublevel (parent_level_id)');
    }
}
