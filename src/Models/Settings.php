<?php

namespace LaravelEnso\Facebook\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    protected function casts(): array
    {
        return [
            'domain_verification' => 'boolean',
        ];
    }
}
