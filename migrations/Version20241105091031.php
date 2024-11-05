<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105091031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cursus (id_cursus INT AUTO_INCREMENT NOT NULL, id_theme INT NOT NULL, name_cursus VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_255A0C379F0A638 (id_theme), PRIMARY KEY(id_cursus)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cursus ADD CONSTRAINT FK_255A0C379F0A638 FOREIGN KEY (id_theme) REFERENCES theme (id_theme)');
        $this->addSql('ALTER TABLE lesson ADD id_cursus INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F32462152E FOREIGN KEY (id_cursus) REFERENCES cursus (id_cursus)');
        $this->addSql('CREATE INDEX IDX_F87474F32462152E ON lesson (id_cursus)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F32462152E');
        $this->addSql('ALTER TABLE cursus DROP FOREIGN KEY FK_255A0C379F0A638');
        $this->addSql('DROP TABLE cursus');
        $this->addSql('DROP INDEX IDX_F87474F32462152E ON lesson');
        $this->addSql('ALTER TABLE lesson DROP id_cursus');
    }
}
