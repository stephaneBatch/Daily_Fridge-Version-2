<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314154745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE compo_recette (id INT AUTO_INCREMENT NOT NULL, recette_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, INDEX IDX_50894E3D89312FE9 (recette_id), INDEX IDX_50894E3DF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_achat (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, date_achat DATETIME NOT NULL, quantite INT NOT NULL, INDEX IDX_68295E25FB88E14F (utilisateur_id), INDEX IDX_68295E25F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, date_limite DATETIME NOT NULL, taux_sucre DOUBLE PRECISION DEFAULT NULL, taux_sel DOUBLE PRECISION DEFAULT NULL, taux_proteine INT DEFAULT NULL, taux_fibre DOUBLE PRECISION DEFAULT NULL, taux_energie INT DEFAULT NULL, taux_gras DOUBLE PRECISION DEFAULT NULL, nutriscore INT DEFAULT NULL, taux_additif INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, type_utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, INDEX IDX_1D1C63B3AD4BC8DB (type_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compo_recette ADD CONSTRAINT FK_50894E3D89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE compo_recette ADD CONSTRAINT FK_50894E3DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE historique_achat ADD CONSTRAINT FK_68295E25FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE historique_achat ADD CONSTRAINT FK_68295E25F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3AD4BC8DB FOREIGN KEY (type_utilisateur_id) REFERENCES type_utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_recette DROP FOREIGN KEY FK_50894E3DF347EFB');
        $this->addSql('ALTER TABLE historique_achat DROP FOREIGN KEY FK_68295E25F347EFB');
        $this->addSql('ALTER TABLE compo_recette DROP FOREIGN KEY FK_50894E3D89312FE9');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3AD4BC8DB');
        $this->addSql('ALTER TABLE historique_achat DROP FOREIGN KEY FK_68295E25FB88E14F');
        $this->addSql('DROP TABLE compo_recette');
        $this->addSql('DROP TABLE historique_achat');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE type_utilisateur');
        $this->addSql('DROP TABLE utilisateur');
    }
}
