<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912170752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partenaire ADD user_partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA3737650BEFC FOREIGN KEY (user_partenaire_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32FFA3737650BEFC ON partenaire (user_partenaire_id)');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d64998de13ac');
        $this->addSql('DROP INDEX uniq_8d93d64998de13ac');
        $this->addSql('ALTER TABLE "user" DROP partenaire_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d64998de13ac FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d64998de13ac ON "user" (partenaire_id)');
        $this->addSql('ALTER TABLE partenaire DROP CONSTRAINT FK_32FFA3737650BEFC');
        $this->addSql('DROP INDEX UNIQ_32FFA3737650BEFC');
        $this->addSql('ALTER TABLE partenaire DROP user_partenaire_id');
    }
}
