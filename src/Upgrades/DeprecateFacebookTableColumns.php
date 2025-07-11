<?php

namespace LaravelEnso\Facebook\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Contracts\ShouldRunManually;
use LaravelEnso\Upgrade\Helpers\Table;

class DeprecateFacebookTableColumns implements MigratesTable, ShouldRunManually
{
    public function isMigrated(): bool
    {
        return ! Table::hasColumn('facebook_settings', 'verification_code');
    }

    public function migrateTable(): void
    {
        Schema::table('facebook_settings', fn (Blueprint $table) => $table->dropColumn([
            'page_id',
            'verification_code',
        ]));
    }
}
