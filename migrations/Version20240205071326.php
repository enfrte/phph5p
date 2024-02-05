<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240205071326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, course_id INTEGER NOT NULL, module_id INTEGER NOT NULL, CONSTRAINT FK_A21CE765591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A21CE765AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_A21CE765591CC992 ON course_module (course_id)');
        $this->addSql('CREATE INDEX IDX_A21CE765AFC2B591 ON course_module (module_id)');
        $this->addSql('CREATE TABLE module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, module_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , file_name VARCHAR(255) NOT NULL, CONSTRAINT FK_C242628A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_C242628A76ED395 ON module (user_id)');
        $this->addSql('CREATE TABLE user_course (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, course_id INTEGER NOT NULL, CONSTRAINT FK_73CC7484A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_73CC7484591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_73CC7484A76ED395 ON user_course (user_id)');
        $this->addSql('CREATE INDEX IDX_73CC7484591CC992 ON user_course (course_id)');
        $this->addSql('CREATE TABLE user_responses (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, course_id INTEGER NOT NULL, module_id INTEGER NOT NULL, question_ref VARCHAR(255) NOT NULL, answer CLOB DEFAULT NULL, response_time DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_31BF1270A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_31BF1270591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_31BF1270AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_31BF1270A76ED395 ON user_responses (user_id)');
        $this->addSql('CREATE INDEX IDX_31BF1270591CC992 ON user_responses (course_id)');
        $this->addSql('CREATE INDEX IDX_31BF1270AFC2B591 ON user_responses (module_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE course_module');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE user_course');
        $this->addSql('DROP TABLE user_responses');
    }
}
