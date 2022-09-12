<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220912200344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partenaire DROP CONSTRAINT fk_32ffa3737650befc');
        $this->addSql('DROP INDEX uniq_32ffa3737650befc');
        $this->addSql('ALTER TABLE partenaire DROP user_partenaire_id');
        $this->addSql('ALTER TABLE "user" ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D64998DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64998DE13AC ON "user" (partenaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE partenaire ADD user_partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT fk_32ffa3737650befc FOREIGN KEY (user_partenaire_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_32ffa3737650befc ON partenaire (user_partenaire_id)');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D64998DE13AC');
        $this->addSql('DROP INDEX UNIQ_8D93D64998DE13AC');
        $this->addSql('ALTER TABLE "user" DROP partenaire_id');
    }
}
