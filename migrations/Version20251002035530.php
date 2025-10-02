<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251002035530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loan (id INT AUTO_INCREMENT NOT NULL, borrower_id INT DEFAULT NULL, borrow_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', return_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', real_return_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', statut VARCHAR(255) DEFAULT NULL, INDEX IDX_C5D30D0311CE312B (borrower_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D0311CE312B FOREIGN KEY (borrower_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE book ADD loan_id INT DEFAULT NULL, CHANGE published�_date published�_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331CE73868F ON book (loan_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331CE73868F');
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D0311CE312B');
        $this->addSql('DROP TABLE loan');
        $this->addSql('DROP INDEX IDX_CBE5A331CE73868F ON book');
        $this->addSql('ALTER TABLE book DROP loan_id, CHANGE published_date published_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
