<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180813113526 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cocktails_alcool (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, recette VARCHAR(255) NOT NULL, decoration VARCHAR(255) NOT NULL, histoire VARCHAR(255) NOT NULL, elaboration VARCHAR(255) NOT NULL, alcool VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A95BBB5D6');
        $this->addSql('DROP INDEX IDX_5F9E962A95BBB5D6 ON comments');
        $this->addSql('ALTER TABLE comments ADD cocktails VARCHAR(255) NOT NULL, DROP cocktails_id, CHANGE message message VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users ADD confirmpassword VARCHAR(25) NOT NULL, CHANGE password password VARCHAR(25) NOT NULL, CHANGE roles roles VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE spiritueux CHANGE elaboration elaboration LONGTEXT NOT NULL, CHANGE lieu_de_production lieuproduction VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cocktails_alcool');
        $this->addSql('ALTER TABLE comments ADD cocktails_id INT NOT NULL, DROP cocktails, CHANGE message message LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A95BBB5D6 FOREIGN KEY (cocktails_id) REFERENCES cocktails_alcool (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A95BBB5D6 ON comments (cocktails_id)');
        $this->addSql('ALTER TABLE spiritueux CHANGE elaboration elaboration VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE lieuproduction lieu_de_production VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users DROP confirmpassword, CHANGE password password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
    }
}
