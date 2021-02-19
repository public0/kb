<?php
declare(strict_types=1);

use ElasticAdapter\Indices\Mapping;
use ElasticAdapter\Indices\Settings;
use ElasticMigrations\Facades\Index;
use ElasticMigrations\MigrationInterface;

final class CreateArticleIndex implements MigrationInterface
{
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Index::create('article', function (Mapping $mapping, Settings $settings) {
            $mapping->text('title');
            $mapping->text('description');
            $mapping->text('body');
            $mapping->keyword('id');
            $mapping->text('lang');
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Index::dropIfExists('article');
    }
}
