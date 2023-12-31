<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929071038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE challenge (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', title VARCHAR(600) NOT NULL, description VARCHAR(255) NOT NULL, status VARCHAR(3000) NOT NULL, category VARCHAR(255) NOT NULL, subcategory VARCHAR(255) NOT NULL, points INT NOT NULL, duration INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', tips VARCHAR(3000) DEFAULT NULL, INDEX IDX_D7098951B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_challenge (id INT AUTO_INCREMENT NOT NULL, challenge_id_id INT NOT NULL, user_uuid_id INT NOT NULL, status VARCHAR(255) NOT NULL, points INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_C2F38FD7B961745 (challenge_id_id), INDEX IDX_C2F38FD99B8CBC0 (user_uuid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, last_connection DATETIME DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D7098951B03A8386 FOREIGN KEY (created_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE current_challenge ADD CONSTRAINT FK_C2F38FD7B961745 FOREIGN KEY (challenge_id_id) REFERENCES challenge (id)');
        $this->addSql('ALTER TABLE current_challenge ADD CONSTRAINT FK_C2F38FD99B8CBC0 FOREIGN KEY (user_uuid_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D7098951B03A8386');
        $this->addSql('ALTER TABLE current_challenge DROP FOREIGN KEY FK_C2F38FD7B961745');
        $this->addSql('ALTER TABLE current_challenge DROP FOREIGN KEY FK_C2F38FD99B8CBC0');
        $this->addSql('DROP TABLE challenge');
        $this->addSql('DROP TABLE current_challenge');
        $this->addSql('DROP TABLE `user`');
    }
}
