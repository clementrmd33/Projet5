<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180810131408 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cocktails_alcool (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, recette VARCHAR(255) NOT NULL, decoration VARCHAR(255) NOT NULL, histoire VARCHAR(255) NOT NULL, elaboration VARCHAR(255) NOT NULL, alcool VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE projet5');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projet5 (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, recette VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, decoration VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, histoire VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, alcool VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, elaboration VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE cocktails_alcool');
    }
}
