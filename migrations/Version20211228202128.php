<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228202128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, type_activite_id INT NOT NULL, titre VARCHAR(255) NOT NULL, debut DATE NOT NULL, fin DATE NOT NULL, description VARCHAR(255) DEFAULT NULL, date_creation DATE NOT NULL, utilisateur_creation VARCHAR(255) NOT NULL, INDEX IDX_B8755515D0165F20 (type_activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loterie_resultat (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515D0165F20 FOREIGN KEY (type_activite_id) REFERENCES type_activite (id)');
        $this->addSql('ALTER TABLE type_activite ADD nom_type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE loterie_resultat');
        $this->addSql('ALTER TABLE type_activite DROP nom_type');
    }
}
