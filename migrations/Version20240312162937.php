<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240312162937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE faq (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question CLOB NOT NULL, answer CLOB NOT NULL)');
        $this->addSql('CREATE TABLE faq_category (faq_id INTEGER NOT NULL, category_id INTEGER NOT NULL, PRIMARY KEY(faq_id, category_id), CONSTRAINT FK_FAEEE0D681BEC8C2 FOREIGN KEY (faq_id) REFERENCES faq (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_FAEEE0D612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_FAEEE0D681BEC8C2 ON faq_category (faq_id)');
        $this->addSql('CREATE INDEX IDX_FAEEE0D612469DE2 ON faq_category (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE faq_category');
    }
}
