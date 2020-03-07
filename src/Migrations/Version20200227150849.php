<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200227150849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, model_id INT NOT NULL, year INT NOT NULL, type VARCHAR(255) NOT NULL, gear_box VARCHAR(255) NOT NULL, place INT NOT NULL, fiscal_power VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_773DE69D7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, company_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4FBF094FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, fuel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, model VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D79572D944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE used_car (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, car_id INT NOT NULL, kilometre INT NOT NULL, price INT NOT NULL, guaranteed INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, photo VARCHAR(255) NOT NULL, fuel VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_738BE53412469DE2 (category_id), UNIQUE INDEX UNIQ_738BE534C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, used_car_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, photo_user VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6491C40D50E (used_car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE used_car ADD CONSTRAINT FK_738BE53412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE used_car ADD CONSTRAINT FK_738BE534C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491C40D50E FOREIGN KEY (used_car_id) REFERENCES used_car (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE used_car DROP FOREIGN KEY FK_738BE534C3C6F69F');
        $this->addSql('ALTER TABLE used_car DROP FOREIGN KEY FK_738BE53412469DE2');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7975B7E7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491C40D50E');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA76ED395');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE used_car');
        $this->addSql('DROP TABLE user');
    }
}
