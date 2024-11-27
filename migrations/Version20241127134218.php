<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127134218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE certification (id_certification INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_lesson INT NOT NULL, obtained_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6C3C6D756B3CA4B (id_user), INDEX IDX_6C3C6D75DE43C11E (id_lesson), PRIMARY KEY(id_certification)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_6C3C6D756B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_6C3C6D75DE43C11E FOREIGN KEY (id_lesson) REFERENCES lesson (id_lesson)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_6C3C6D756B3CA4B');
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_6C3C6D75DE43C11E');
        $this->addSql('DROP TABLE certification');
    }
}
