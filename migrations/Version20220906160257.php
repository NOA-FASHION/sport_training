<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220906160257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE structure_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE structure (id INT NOT NULL, partenaire_id INT NOT NULL, name_structure VARCHAR(50) NOT NULL, name_responsable VARCHAR(50) NOT NULL, adresse_structure VARCHAR(255) DEFAULT NULL, active_structure BOOLEAN NOT NULL, members_read BOOLEAN NOT NULL, members_write BOOLEAN NOT NULL, members_product BOOLEAN NOT NULL, members_payment BOOLEAN NOT NULL, members_stistiques_read BOOLEAN NOT NULL, members_subscription_read BOOLEAN NOT NULL, payment_schedules_read BOOLEAN NOT NULL, payment_shedules_write BOOLEAN NOT NULL, payment_days_read BOOLEAN NOT NULL, payment_days_write BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6F0137EA98DE13AC ON structure (partenaire_id)');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EA98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE structure_id_seq CASCADE');
        $this->addSql('ALTER TABLE structure DROP CONSTRAINT FK_6F0137EA98DE13AC');
        $this->addSql('DROP TABLE structure');
    }
}
