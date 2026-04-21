<?php

namespace LaravelEnso\Facebook\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Contracts\ShouldRunManually;
use LaravelEnso\Upgrade\Helpers\Table;

class AddFacebookTableColumns implements MigratesTable, ShouldRunManually
{
    public function isMigrated(): bool
    {
        return Table::hasColumn('facebook_settings', 'recaptcha_secret');
    }

    public function migrateTable(): void
    {
        Schema::table('facebook_settings', function (Blueprint $table) {
            $table->string('verification_code')->nullable();
            $table->string('page_id')->nullable();
        });
    }
}
