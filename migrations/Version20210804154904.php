<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804154904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE occupied_room DROP CONSTRAINT FK_3C19C92254177093');
        $this->addSql('ALTER TABLE occupied_room ADD CONSTRAINT FK_3C19C92254177093 FOREIGN KEY (room_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE occupied_room DROP CONSTRAINT fk_3c19c92254177093');
        $this->addSql('ALTER TABLE occupied_room ADD CONSTRAINT fk_3c19c92254177093 FOREIGN KEY (room_id) REFERENCES room_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
