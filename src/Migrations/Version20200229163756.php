<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200229163756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_recette DROP FOREIGN KEY FK_50894E3D89312FE9');
        $this->addSql('ALTER TABLE compo_recette DROP FOREIGN KEY FK_50894E3DF347EFB');
        $this->addSql('DROP INDEX UNIQ_50894E3D89312FE9 ON compo_recette');
        $this->addSql('DROP INDEX UNIQ_50894E3DF347EFB ON compo_recette');
        $this->addSql('ALTER TABLE compo_recette DROP recette_id, DROP produit_id');
        $this->addSql('ALTER TABLE produit ADD compo_recette_id INT DEFAULT NULL, CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT NULL, CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT NULL, CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT NULL, CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B06CEAAC FOREIGN KEY (compo_recette_id) REFERENCES compo_recette (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27B06CEAAC ON produit (compo_recette_id)');
        $this->addSql('ALTER TABLE recette ADD compo_recette_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390B06CEAAC FOREIGN KEY (compo_recette_id) REFERENCES compo_recette (id)');
        $this->addSql('CREATE INDEX IDX_49BB6390B06CEAAC ON recette (compo_recette_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compo_recette ADD recette_id INT DEFAULT NULL, ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compo_recette ADD CONSTRAINT FK_50894E3D89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE compo_recette ADD CONSTRAINT FK_50894E3DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50894E3D89312FE9 ON compo_recette (recette_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50894E3DF347EFB ON compo_recette (produit_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B06CEAAC');
        $this->addSql('DROP INDEX IDX_29A5EC27B06CEAAC ON produit');
        $this->addSql('ALTER TABLE produit DROP compo_recette_id, CHANGE taux_sucre taux_sucre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_sel taux_sel DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_proteine taux_proteine INT DEFAULT NULL, CHANGE taux_fibre taux_fibre DOUBLE PRECISION DEFAULT \'NULL\', CHANGE taux_energie taux_energie INT DEFAULT NULL, CHANGE taux_gras taux_gras DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nutriscore nutriscore INT DEFAULT NULL, CHANGE taux_additif taux_additif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390B06CEAAC');
        $this->addSql('DROP INDEX IDX_49BB6390B06CEAAC ON recette');
        $this->addSql('ALTER TABLE recette DROP compo_recette_id');
    }
}
