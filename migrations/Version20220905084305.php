<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220905084305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personage_house (personage_id INT NOT NULL, house_id INT NOT NULL, INDEX IDX_4818DF5CEA8E3E4A (personage_id), INDEX IDX_4818DF5C6BB74515 (house_id), PRIMARY KEY(personage_id, house_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personage_house ADD CONSTRAINT FK_4818DF5CEA8E3E4A FOREIGN KEY (personage_id) REFERENCES personage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personage_house ADD CONSTRAINT FK_4818DF5C6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_house DROP FOREIGN KEY FK_9916DEFF1136BE75');
        $this->addSql('ALTER TABLE character_house DROP FOREIGN KEY FK_9916DEFF6BB74515');
        $this->addSql('DROP TABLE character_house');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_937AB0342055B9A2');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_937AB034A9F87BD');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_937AB034B78A354D');
        $this->addSql('DROP INDEX idx_937ab034a9f87bd ON personage');
        $this->addSql('CREATE INDEX IDX_E60A6EC5A9F87BD ON personage (title_id)');
        $this->addSql('DROP INDEX idx_937ab034b78a354d ON personage');
        $this->addSql('CREATE INDEX IDX_E60A6EC5B78A354D ON personage (mother_id)');
        $this->addSql('DROP INDEX idx_937ab0342055b9a2 ON personage');
        $this->addSql('CREATE INDEX IDX_E60A6EC52055B9A2 ON personage (father_id)');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_937AB0342055B9A2 FOREIGN KEY (father_id) REFERENCES personage (id)');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_937AB034A9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_937AB034B78A354D FOREIGN KEY (mother_id) REFERENCES personage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_house (character_id INT NOT NULL, house_id INT NOT NULL, INDEX IDX_9916DEFF1136BE75 (character_id), INDEX IDX_9916DEFF6BB74515 (house_id), PRIMARY KEY(character_id, house_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE character_house ADD CONSTRAINT FK_9916DEFF1136BE75 FOREIGN KEY (character_id) REFERENCES personage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_house ADD CONSTRAINT FK_9916DEFF6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personage_house DROP FOREIGN KEY FK_4818DF5CEA8E3E4A');
        $this->addSql('ALTER TABLE personage_house DROP FOREIGN KEY FK_4818DF5C6BB74515');
        $this->addSql('DROP TABLE personage_house');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_E60A6EC5A9F87BD');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_E60A6EC5B78A354D');
        $this->addSql('ALTER TABLE personage DROP FOREIGN KEY FK_E60A6EC52055B9A2');
        $this->addSql('DROP INDEX idx_e60a6ec5b78a354d ON personage');
        $this->addSql('CREATE INDEX IDX_937AB034B78A354D ON personage (mother_id)');
        $this->addSql('DROP INDEX idx_e60a6ec52055b9a2 ON personage');
        $this->addSql('CREATE INDEX IDX_937AB0342055B9A2 ON personage (father_id)');
        $this->addSql('DROP INDEX idx_e60a6ec5a9f87bd ON personage');
        $this->addSql('CREATE INDEX IDX_937AB034A9F87BD ON personage (title_id)');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_E60A6EC5A9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_E60A6EC5B78A354D FOREIGN KEY (mother_id) REFERENCES personage (id)');
        $this->addSql('ALTER TABLE personage ADD CONSTRAINT FK_E60A6EC52055B9A2 FOREIGN KEY (father_id) REFERENCES personage (id)');
    }
}
