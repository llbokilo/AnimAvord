<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229140218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD loterie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B87555151D2F9C30 FOREIGN KEY (loterie_id) REFERENCES loterie_resultat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B87555151D2F9C30 ON activite (loterie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B87555151D2F9C30');
        $this->addSql('DROP INDEX UNIQ_B87555151D2F9C30 ON activite');
        $this->addSql('ALTER TABLE activite DROP loterie_id');
    }
}
