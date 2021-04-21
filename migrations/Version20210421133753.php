<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421133753 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_history (id INT AUTO_INCREMENT NOT NULL, legalform_id INT DEFAULT NULL, company_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, siren VARCHAR(9) NOT NULL, registration_city VARCHAR(255) NOT NULL, registration_date DATETIME NOT NULL, capital INT NOT NULL, street_number1 VARCHAR(5) NOT NULL, way_type1 VARCHAR(255) NOT NULL, way_name1 VARCHAR(255) NOT NULL, city1 VARCHAR(255) NOT NULL, post_code1 VARCHAR(11) NOT NULL, street_number2 VARCHAR(5) DEFAULT NULL, way_type2 VARCHAR(255) DEFAULT NULL, way_name2 VARCHAR(255) DEFAULT NULL, city2 VARCHAR(255) DEFAULT NULL, post_code2 VARCHAR(11) DEFAULT NULL, street_number3 VARCHAR(5) DEFAULT NULL, waytype3 VARCHAR(255) DEFAULT NULL, way_name3 VARCHAR(255) DEFAULT NULL, city3 VARCHAR(255) DEFAULT NULL, post_code3 VARCHAR(11) DEFAULT NULL, updated_at DATETIME NOT NULL, INDEX IDX_7E86A9C4AF3A685 (legalform_id), INDEX IDX_7E86A9C979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_history ADD CONSTRAINT FK_7E86A9C4AF3A685 FOREIGN KEY (legalform_id) REFERENCES legal_form (id)');
        $this->addSql('ALTER TABLE company_history ADD CONSTRAINT FK_7E86A9C979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE company ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE company_history');
        $this->addSql('ALTER TABLE company DROP created_at, DROP updated_at');
    }
}
