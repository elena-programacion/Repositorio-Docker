<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240703152214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE motorbike_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE truck_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE motorbike (id INT NOT NULL, cc INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE truck (id INT NOT NULL, kms INT DEFAULT NULL, capacity DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE motorbike_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE truck_id_seq CASCADE');
        $this->addSql('DROP TABLE motorbike');
        $this->addSql('DROP TABLE truck');
    }
}
