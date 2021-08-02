<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210730150605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_categorie_voiture (annonce_id INT NOT NULL, categorie_voiture_id INT NOT NULL, INDEX IDX_F1F834FD8805AB2F (annonce_id), INDEX IDX_F1F834FD9F486216 (categorie_voiture_id), PRIMARY KEY(annonce_id, categorie_voiture_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce_garage (annonce_id INT NOT NULL, garage_id INT NOT NULL, INDEX IDX_FF8162158805AB2F (annonce_id), INDEX IDX_FF816215C4FFF555 (garage_id), PRIMARY KEY(annonce_id, garage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnel (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, identifiant VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_siret INT NOT NULL, num_tel VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7A28C10FE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce_categorie_voiture ADD CONSTRAINT FK_F1F834FD8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_categorie_voiture ADD CONSTRAINT FK_F1F834FD9F486216 FOREIGN KEY (categorie_voiture_id) REFERENCES categorie_voiture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_garage ADD CONSTRAINT FK_FF8162158805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_garage ADD CONSTRAINT FK_FF816215C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce ADD modele_id INT NOT NULL, ADD type_carburant_id INT NOT NULL, ADD photo_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5B5991721 FOREIGN KEY (type_carburant_id) REFERENCES type_carburant (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E57E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5AC14B70A ON annonce (modele_id)');
        $this->addSql('CREATE INDEX IDX_F65593E5B5991721 ON annonce (type_carburant_id)');
        $this->addSql('CREATE INDEX IDX_F65593E57E9E4C8C ON annonce (photo_id)');
        $this->addSql('ALTER TABLE garage ADD adresse_id INT DEFAULT NULL, ADD professionnel_id INT NOT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F26610B4DE7DC5C ON garage (adresse_id)');
        $this->addSql('CREATE INDEX IDX_9F26610B8A49CC82 ON garage (professionnel_id)');
        $this->addSql('ALTER TABLE modele ADD marque_id INT NOT NULL');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_100285584827B9B2 ON modele (marque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B8A49CC82');
        $this->addSql('DROP TABLE annonce_categorie_voiture');
        $this->addSql('DROP TABLE annonce_garage');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5AC14B70A');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5B5991721');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E57E9E4C8C');
        $this->addSql('DROP INDEX IDX_F65593E5AC14B70A ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E5B5991721 ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E57E9E4C8C ON annonce');
        $this->addSql('ALTER TABLE annonce DROP modele_id, DROP type_carburant_id, DROP photo_id');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B4DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_9F26610B4DE7DC5C ON garage');
        $this->addSql('DROP INDEX IDX_9F26610B8A49CC82 ON garage');
        $this->addSql('ALTER TABLE garage DROP adresse_id, DROP professionnel_id');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('DROP INDEX IDX_100285584827B9B2 ON modele');
        $this->addSql('ALTER TABLE modele DROP marque_id');
    }
}
