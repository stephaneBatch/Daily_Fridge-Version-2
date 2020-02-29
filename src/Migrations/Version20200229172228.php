<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229172228 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE historique_achat_utilisateur');
        $this->addSql('ALTER TABLE compo_recette CHANGE recette_id recette_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_achat ADD utilisateur_id INT DEFAULT NULL, ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_achat ADD CONSTRAINT FK_68295E25FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE historique_achat ADD CONSTRAINT FK_68295E25F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_68295E25FB88E14F ON historique_achat (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_68295E25F347EFB ON historique_achat (produit_id)');
        $this->addSql('ALTER TABLE produit CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT NULL, CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT NULL, CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE type_utilisateur_id type_utilisateur_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE historique_achat_utilisateur (historique_achat_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_BD088021FB88E14F (utilisateur_id), INDEX IDX_BD0880213E4DA9E5 (historique_achat_id), PRIMARY KEY(historique_achat_id, utilisateur_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE historique_achat_utilisateur ADD CONSTRAINT FK_BD0880213E4DA9E5 FOREIGN KEY (historique_achat_id) REFERENCES historique_achat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique_achat_utilisateur ADD CONSTRAINT FK_BD088021FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compo_recette CHANGE recette_id recette_id INT DEFAULT NULL, CHANGE produit_id produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique_achat DROP FOREIGN KEY FK_68295E25FB88E14F');
        $this->addSql('ALTER TABLE historique_achat DROP FOREIGN KEY FK_68295E25F347EFB');
        $this->addSql('DROP INDEX IDX_68295E25FB88E14F ON historique_achat');
        $this->addSql('DROP INDEX IDX_68295E25F347EFB ON historique_achat');
        $this->addSql('ALTER TABLE historique_achat DROP utilisateur_id, DROP produit_id');
        $this->addSql('ALTER TABLE produit CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE type_utilisateur_id type_utilisateur_id INT DEFAULT NULL');
    }
}
