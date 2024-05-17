<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517133448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_SLUG (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, request_id INT NOT NULL, content LONGTEXT NOT NULL, date_created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9474526C642B8210 (admin_id), INDEX IDX_9474526C427EB8A5 (request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, technician_id INT DEFAULT NULL, category_id INT DEFAULT NULL, status_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, date_created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(255) NOT NULL, user_name VARCHAR(255) DEFAULT NULL, user_email VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, ev_number VARCHAR(255) DEFAULT NULL, image VARCHAR(512) DEFAULT NULL, user_phone VARCHAR(255) DEFAULT NULL, INDEX IDX_3B978F9FE6C5D496 (technician_id), INDEX IDX_3B978F9F12469DE2 (category_id), INDEX IDX_3B978F9F6BF700BD (status_id), UNIQUE INDEX UNIQ_IDENTIFIER_SLUG (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, token VARCHAR(255) NOT NULL, date_created DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_B9983CE5642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FE6C5D496 FOREIGN KEY (technician_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE reset_password ADD CONSTRAINT FK_B9983CE5642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C642B8210');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C427EB8A5');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FE6C5D496');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9F12469DE2');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9F6BF700BD');
        $this->addSql('ALTER TABLE reset_password DROP FOREIGN KEY FK_B9983CE5642B8210');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE reset_password');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
