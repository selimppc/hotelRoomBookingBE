<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804141942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE room (id INT NOT NULL, hotel_id INT NOT NULL, room_type_id INT DEFAULT NULL, number INT NOT NULL, name VARCHAR(255) NOT NULL, status BOOLEAN DEFAULT NULL, is_smoke BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_729F519B3243BB18 ON room (hotel_id)');
        $this->addSql('CREATE INDEX IDX_729F519B296E3073 ON room (room_type_id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B296E3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_type DROP CONSTRAINT fk_efdabd4d3243bb18');
        $this->addSql('ALTER TABLE room_type DROP CONSTRAINT fk_efdabd4d296e3073');
        $this->addSql('DROP INDEX idx_efdabd4d3243bb18');
        $this->addSql('DROP INDEX idx_efdabd4d296e3073');
        $this->addSql('ALTER TABLE room_type DROP hotel_id');
        $this->addSql('ALTER TABLE room_type DROP room_type_id');
        $this->addSql('ALTER TABLE room_type DROP number');
        $this->addSql('ALTER TABLE room_type DROP name');
        $this->addSql('ALTER TABLE room_type DROP status');
        $this->addSql('ALTER TABLE room_type DROP is_smoke');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE room_id_seq CASCADE');
        $this->addSql('DROP TABLE room');
        $this->addSql('ALTER TABLE room_type ADD hotel_id INT NOT NULL');
        $this->addSql('ALTER TABLE room_type ADD room_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE room_type ADD number VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE room_type ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE room_type ADD status BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE room_type ADD is_smoke BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE room_type ADD CONSTRAINT fk_efdabd4d3243bb18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_type ADD CONSTRAINT fk_efdabd4d296e3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_efdabd4d3243bb18 ON room_type (hotel_id)');
        $this->addSql('CREATE INDEX idx_efdabd4d296e3073 ON room_type (room_type_id)');
    }
}
