<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211228192121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418831D4546');
        $this->addSql('ALTER TABLE type_activite DROP FOREIGN KEY FK_758A72E99B0F88B1');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515F2723010');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE type_activite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, type_act_id INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, debut DATE NOT NULL, fin DATE NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, termine TINYINT(1) NOT NULL, date_creation DATE NOT NULL, utilisateur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B8755515F2723010 (type_act_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_activite_id INT NOT NULL, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_14B78418831D4546 (id_activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_activite (id INT AUTO_INCREMENT NOT NULL, activite_id INT NOT NULL, INDEX IDX_758A72E99B0F88B1 (activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515F2723010 FOREIGN KEY (type_act_id) REFERENCES type_activite (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418831D4546 FOREIGN KEY (id_activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE type_activite ADD CONSTRAINT FK_758A72E99B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
    }
}
