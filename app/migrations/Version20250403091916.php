<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250403091916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE manga_tag (manga_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_52E8F5BA7B6461 (manga_id), INDEX IDX_52E8F5BABAD26311 (tag_id), PRIMARY KEY(manga_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE manga_tag ADD CONSTRAINT FK_52E8F5BA7B6461 FOREIGN KEY (manga_id) REFERENCES manga (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manga_tag ADD CONSTRAINT FK_52E8F5BABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga_tag DROP FOREIGN KEY FK_52E8F5BA7B6461');
        $this->addSql('ALTER TABLE manga_tag DROP FOREIGN KEY FK_52E8F5BABAD26311');
        $this->addSql('DROP TABLE manga_tag');
        $this->addSql('DROP TABLE tag');
    }
}
