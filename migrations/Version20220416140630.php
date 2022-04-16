<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220416140630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD total_tournaments INT NOT NULL, ADD won_tournaments INT NOT NULL, ADD total_wins INT NOT NULL, ADD total_loses INT NOT NULL, ADD total_draws INT NOT NULL');
        $this->addSql('ALTER TABLE national ADD total_tournaments INT NOT NULL, ADD won_tournaments INT NOT NULL, ADD total_wins INT NOT NULL, ADD total_loses INT NOT NULL, ADD total_draws INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP total_tournaments, DROP won_tournaments, DROP total_wins, DROP total_loses, DROP total_draws');
        $this->addSql('ALTER TABLE national DROP total_tournaments, DROP won_tournaments, DROP total_wins, DROP total_loses, DROP total_draws');
    }
}
