<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730151733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce_categorie_voiture');
        $this->addSql('ALTER TABLE annonce ADD categorie_voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E59F486216 FOREIGN KEY (categorie_voiture_id) REFERENCES categorie_voiture (id)');
        $this->addSql('CREATE INDEX IDX_F65593E59F486216 ON annonce (categorie_voiture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_categorie_voiture (annonce_id INT NOT NULL, categorie_voiture_id INT NOT NULL, INDEX IDX_F1F834FD8805AB2F (annonce_id), INDEX IDX_F1F834FD9F486216 (categorie_voiture_id), PRIMARY KEY(annonce_id, categorie_voiture_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE annonce_categorie_voiture ADD CONSTRAINT FK_F1F834FD8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_categorie_voiture ADD CONSTRAINT FK_F1F834FD9F486216 FOREIGN KEY (categorie_voiture_id) REFERENCES categorie_voiture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E59F486216');
        $this->addSql('DROP INDEX IDX_F65593E59F486216 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP categorie_voiture_id');
    }
}
