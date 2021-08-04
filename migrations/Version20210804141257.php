<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804141257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE hotel_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE occupied_room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rese_reserved_room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE room_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE hotel (id INT NOT NULL, owner_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3535ED97E3C61F9 ON hotel (owner_id)');
        $this->addSql('CREATE TABLE occupied_room (id INT NOT NULL, room_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, check_in TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, check_out TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3C19C92254177093 ON occupied_room (room_id)');
        $this->addSql('CREATE INDEX IDX_3C19C922B83297E7 ON occupied_room (reservation_id)');
        $this->addSql('CREATE TABLE rese_reserved_room (id INT NOT NULL, room_type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, number_of_rooms INT DEFAULT NULL, status BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F72AAA2A296E3073 ON rese_reserved_room (room_type_id)');
        $this->addSql('CREATE INDEX IDX_F72AAA2AB83297E7 ON rese_reserved_room (reservation_id)');
        $this->addSql('CREATE TABLE reservation (id INT NOT NULL, client_id INT DEFAULT NULL, date_in TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, date_out TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, made_by INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
        $this->addSql('CREATE TABLE room_type (id INT NOT NULL, hotel_id INT NOT NULL, room_type_id INT DEFAULT NULL, description TEXT DEFAULT NULL, max_capacity INT DEFAULT NULL, number VARCHAR(128) DEFAULT NULL, name VARCHAR(255) NOT NULL, status BOOLEAN DEFAULT NULL, is_smoke BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EFDABD4D3243BB18 ON room_type (hotel_id)');
        $this->addSql('CREATE INDEX IDX_EFDABD4D296E3073 ON room_type (room_type_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, first_name VARCHAR(128) DEFAULT NULL, last_name VARCHAR(128) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED97E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE occupied_room ADD CONSTRAINT FK_3C19C92254177093 FOREIGN KEY (room_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE occupied_room ADD CONSTRAINT FK_3C19C922B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rese_reserved_room ADD CONSTRAINT FK_F72AAA2A296E3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rese_reserved_room ADD CONSTRAINT FK_F72AAA2AB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_type ADD CONSTRAINT FK_EFDABD4D3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE room_type ADD CONSTRAINT FK_EFDABD4D296E3073 FOREIGN KEY (room_type_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE room_type DROP CONSTRAINT FK_EFDABD4D3243BB18');
        $this->addSql('ALTER TABLE occupied_room DROP CONSTRAINT FK_3C19C922B83297E7');
        $this->addSql('ALTER TABLE rese_reserved_room DROP CONSTRAINT FK_F72AAA2AB83297E7');
        $this->addSql('ALTER TABLE occupied_room DROP CONSTRAINT FK_3C19C92254177093');
        $this->addSql('ALTER TABLE rese_reserved_room DROP CONSTRAINT FK_F72AAA2A296E3073');
        $this->addSql('ALTER TABLE room_type DROP CONSTRAINT FK_EFDABD4D296E3073');
        $this->addSql('ALTER TABLE hotel DROP CONSTRAINT FK_3535ED97E3C61F9');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C8495519EB6921');
        $this->addSql('DROP SEQUENCE hotel_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE occupied_room_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rese_reserved_room_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE room_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE occupied_room');
        $this->addSql('DROP TABLE rese_reserved_room');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE room_type');
        $this->addSql('DROP TABLE "user"');
    }
}
