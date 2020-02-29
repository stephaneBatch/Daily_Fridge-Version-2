<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229173307 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_recette CHANGE recette_id recette_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_achat ADD date_achat DATETIME NOT NULL, ADD quantite INT NOT NULL, CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT NULL, CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT NULL, CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE type_utilisateur_id type_utilisateur_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_recette CHANGE recette_id recette_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_achat DROP date_achat, DROP quantite, CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE type_utilisateur_id type_utilisateur_id INT DEFAULT NULL');
    }
}
