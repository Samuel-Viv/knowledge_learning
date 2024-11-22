<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122142005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE purchase (id_purchase INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_cursus INT DEFAULT NULL, id_lesson INT DEFAULT NULL, purchase_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6117D13B6B3CA4B (id_user), INDEX IDX_6117D13B2462152E (id_cursus), INDEX IDX_6117D13BDE43C11E (id_lesson), PRIMARY KEY(id_purchase)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B2462152E FOREIGN KEY (id_cursus) REFERENCES cursus (id_cursus)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13BDE43C11E FOREIGN KEY (id_lesson) REFERENCES lesson (id_lesson)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B6B3CA4B');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B2462152E');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13BDE43C11E');
        $this->addSql('DROP TABLE purchase');
    }
}
