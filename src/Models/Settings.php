<?php

namespace LaravelEnso\Facebook\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Rememberable\Traits\Rememberable;

class Settings extends Model
{
    use HasFactory, Rememberable;

    protected $table = 'facebook_settings';

    protected $guarded = ['id'];

    public static function current()
    {
        return self::cacheGet(1)
            ?? self::factory()->create();
    }

    public static function verificationCode(): ?string
    {
        return Config::get('enso.facebook.verificationCode') ?? self::current()->verification_code;
    }

    public static function pageId(): ?string
    {
        return Config::get('enso.facebook.pageId') ?? self::current()->page_id;
    }

    protected function casts(): array
    {
        return [
            'domain_verification' => 'boolean',
        ];
    }
}
