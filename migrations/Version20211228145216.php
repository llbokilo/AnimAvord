<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228145216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD type_act_id INT NOT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515F2723010 FOREIGN KEY (type_act_id) REFERENCES type_activite (id)');
        $this->addSql('CREATE INDEX IDX_B8755515F2723010 ON activite (type_act_id)');
        $this->addSql('ALTER TABLE type_activite DROP type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515F2723010');
        $this->addSql('DROP INDEX IDX_B8755515F2723010 ON activite');
        $this->addSql('ALTER TABLE activite DROP type_act_id');
        $this->addSql('ALTER TABLE type_activite ADD type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
