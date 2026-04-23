<?php

namespace LaravelEnso\Facebook\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Facebook\Models\Settings;
use LaravelEnso\Upgrade\Contracts\MigratesData;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Contracts\ShouldRunManually;
use LaravelEnso\Upgrade\Helpers\Table;

class AddFacebookTableColumns implements MigratesTable, MigratesData, ShouldRunManually
{
    public function isMigrated(): bool
    {
        return Table::hasColumn('facebook_settings', 'verification_code');
    }

    public function migrateTable(): void
    {
        Schema::table('facebook_settings', function (Blueprint $table) {
            $table->string('verification_code')->nullable();
            $table->string('page_id')->nullable();
        });
    }

    public function migrateData(): void
    {
        Settings::current()->update([
            'verification_code' => Config::get('enso.google.verificationCode'),
            'page_id' => Config::get('enso.google.pageId'),
        ]);
    }
}
