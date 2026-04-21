<?php

namespace LaravelEnso\Facebook\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'facebook_settings';

    protected $guarded = ['id'];

    public static function current()
    {
        return self::find(Config::get('enso.facebook.settingsId'))
            ?? self::factory()->create();
    }

    public static function verificationCode(): ?string
    {
        return self::current()->verification_code;
    }

    public static function pageId(): ?string
    {
        return self::current()->page_id;
    }

    protected function casts(): array
    {
        return [
            'domain_verification' => 'boolean',
        ];
    }
}
