<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240323152727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__course AS SELECT id, sublevel_id, title, slug, video_url, content, short_description FROM course');
        $this->addSql('DROP TABLE course');
        $this->addSql('CREATE TABLE course (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sublevel_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, videourl VARCHAR(255) DEFAULT NULL, content CLOB DEFAULT NULL, short_description VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_169E6FB95421F62E FOREIGN KEY (sublevel_id) REFERENCES sublevel (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO course (id, sublevel_id, title, slug, videourl, content, short_description) SELECT id, sublevel_id, title, slug, video_url, content, short_description FROM __temp__course');
        $this->addSql('DROP TABLE __temp__course');
        $this->addSql('CREATE INDEX IDX_169E6FB95421F62E ON course (sublevel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__course AS SELECT id, sublevel_id, title, slug, videourl, content, short_description FROM course');
        $this->addSql('DROP TABLE course');
        $this->addSql('CREATE TABLE course (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sublevel_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, video_url VARCHAR(255) DEFAULT NULL, content CLOB DEFAULT NULL, short_description VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_169E6FB95421F62E FOREIGN KEY (sublevel_id) REFERENCES sublevel (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO course (id, sublevel_id, title, slug, video_url, content, short_description) SELECT id, sublevel_id, title, slug, videourl, content, short_description FROM __temp__course');
        $this->addSql('DROP TABLE __temp__course');
        $this->addSql('CREATE INDEX IDX_169E6FB95421F62E ON course (sublevel_id)');
    }
}
