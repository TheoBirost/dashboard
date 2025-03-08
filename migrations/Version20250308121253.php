<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308121253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE argent ADD revenus NUMERIC(10, 2) DEFAULT NULL, ADD depenses NUMERIC(10, 2) DEFAULT NULL, ADD solde NUMERIC(10, 2) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, ADD date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sport ADD type_sport VARCHAR(50) DEFAULT NULL, ADD date_sport DATETIME DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sport DROP type_sport, DROP date_sport, DROP description');
        $this->addSql('ALTER TABLE argent DROP revenus, DROP depenses, DROP solde, DROP description, DROP date');
    }
}
