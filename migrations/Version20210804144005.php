<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804144005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE rese_reserved_room_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE reserved_room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reserved_room (id INT NOT NULL, room_type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, number_of_rooms INT DEFAULT NULL, status BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_223AE444296E3073 ON reserved_room (room_type_id)');
        $this->addSql('CREATE INDEX IDX_223AE444B83297E7 ON reserved_room (reservation_id)');
        $this->addSql('ALTER TABLE reserved_room ADD CONSTRAINT FK_223AE444296E3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reserved_room ADD CONSTRAINT FK_223AE444B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE rese_reserved_room');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE reserved_room_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE rese_reserved_room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE rese_reserved_room (id INT NOT NULL, room_type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, number_of_rooms INT DEFAULT NULL, status BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_f72aaa2ab83297e7 ON rese_reserved_room (reservation_id)');
        $this->addSql('CREATE INDEX idx_f72aaa2a296e3073 ON rese_reserved_room (room_type_id)');
        $this->addSql('ALTER TABLE rese_reserved_room ADD CONSTRAINT fk_f72aaa2a296e3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rese_reserved_room ADD CONSTRAINT fk_f72aaa2ab83297e7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE reserved_room');
    }
}
