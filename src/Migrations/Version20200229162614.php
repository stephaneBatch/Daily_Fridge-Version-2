<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229162614 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE compo_recette (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_50894E3D89312FE9 (recette_id), UNIQUE INDEX UNIQ_50894E3DF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compo_recette ADD CONSTRAINT FK_50894E3D89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE compo_recette ADD CONSTRAINT FK_50894E3DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT NULL, CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT NULL, CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_recette DROP FOREIGN KEY FK_50894E3D89312FE9');
        $this->addSql('DROP TABLE compo_recette');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE type_utilisateur');
        $this->addSql('ALTER TABLE produit CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
    }
}
