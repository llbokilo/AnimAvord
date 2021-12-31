<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228191139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_activite ADD activite_id INT NOT NULL');
        $this->addSql('ALTER TABLE type_activite ADD CONSTRAINT FK_758A72E99B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_758A72E99B0F88B1 ON type_activite (activite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_activite DROP FOREIGN KEY FK_758A72E99B0F88B1');
        $this->addSql('DROP INDEX IDX_758A72E99B0F88B1 ON type_activite');
        $this->addSql('ALTER TABLE type_activite DROP activite_id');
    }
}
