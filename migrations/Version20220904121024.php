<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220904121024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, title_id INT DEFAULT NULL, mother_id INT DEFAULT NULL, father_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, biography LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_937AB034A9F87BD (title_id), INDEX IDX_937AB034B78A354D (mother_id), INDEX IDX_937AB0342055B9A2 (father_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_house (character_id INT NOT NULL, house_id INT NOT NULL, INDEX IDX_9916DEFF1136BE75 (character_id), INDEX IDX_9916DEFF6BB74515 (house_id), PRIMARY KEY(character_id, house_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, colour VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE title (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034A9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034B78A354D FOREIGN KEY (mother_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0342055B9A2 FOREIGN KEY (father_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_house ADD CONSTRAINT FK_9916DEFF1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_house ADD CONSTRAINT FK_9916DEFF6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034A9F87BD');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B78A354D');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0342055B9A2');
        $this->addSql('ALTER TABLE character_house DROP FOREIGN KEY FK_9916DEFF1136BE75');
        $this->addSql('ALTER TABLE character_house DROP FOREIGN KEY FK_9916DEFF6BB74515');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE character_house');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE title');
    }
}
