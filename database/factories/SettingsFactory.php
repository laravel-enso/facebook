<?php

namespace LaravelEnso\Facebook\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelEnso\Facebook\Models\Settings as Model;

class SettingsFactory extends Factory
{
    protected $model = Model::class;

    public function definition()
    {
        return [
            'domain_verification' => false,
        ];
    }
}
