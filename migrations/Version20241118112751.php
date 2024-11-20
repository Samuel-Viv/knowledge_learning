<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241118112751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart (id_cart INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_cursus INT DEFAULT NULL, id_lesson INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_BA388B76B3CA4B (id_user), INDEX IDX_BA388B72462152E (id_cursus), INDEX IDX_BA388B7DE43C11E (id_lesson), UNIQUE INDEX unique_cart_item (id_user, id_cursus, id_lesson), PRIMARY KEY(id_cart)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B76B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B72462152E FOREIGN KEY (id_cursus) REFERENCES cursus (id_cursus)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7DE43C11E FOREIGN KEY (id_lesson) REFERENCES lesson (id_lesson)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B76B3CA4B');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B72462152E');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7DE43C11E');
        $this->addSql('DROP TABLE cart');
    }
}
