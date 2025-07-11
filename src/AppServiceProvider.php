<?php

namespace LaravelEnso\Facebook;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()->publish();
    }

    public function register()
    {
        //
    }

    private function load(): self
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/facebook.php', 'enso.facebook');

        return $this;
    }

    private function publish(): self
    {
        $this->publishes([
            __DIR__.'/../config' => config_path('enso'),
        ], ['facebook-config', 'enso-config']);

        return $this;
    }
}
