<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203183318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initial commit of database schema';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
        CREATE TABLE job 
        (
            id INT AUTO_INCREMENT NOT NULL,
            property_id INT NOT NULL,
            summary VARCHAR(150) DEFAULT NULL,
            description VARCHAR(500) NOT NULL,
            status ENUM(\'open\', \'completed\', \'in-progress\', \'cancelled\') NOT NULL COMMENT \'(DC2Type:JobStatusType)\',
            first_name VARCHAR(30) NOT NULL,
            last_name VARCHAR(30) NOT NULL,
            email VARCHAR(120) NOT NULL,
            INDEX IDX_FBD8E0F8549213EC (property_id),
            PRIMARY KEY(id)
        ) 
        DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
        CREATE TABLE property 
        (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(255) NOT NULL,
            PRIMARY KEY(id)
        ) 
        DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
        CREATE TABLE messenger_messages 
        (
            id BIGINT AUTO_INCREMENT NOT NULL,
            body LONGTEXT NOT NULL,
            headers LONGTEXT NOT NULL,
            queue_name VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL,
            available_at DATETIME NOT NULL,
            delivered_at DATETIME DEFAULT NULL,
            INDEX IDX_75EA56E016BA31DB (delivered_at), 
            PRIMARY KEY(id)
        ) 
        DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('
            ALTER TABLE job 
            ADD CONSTRAINT FK_FBD8E0F8549213EC FOREIGN KEY (property_id)
            REFERENCES property (id)
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8549213EC');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
