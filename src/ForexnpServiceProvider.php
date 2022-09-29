<?php

namespace Jinesh\Forexnp;

use Carbon\Laravel\ServiceProvider;

class ForexnpServiceProvider extends ServiceProvider
{

    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'forex');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/config/forex.php', 'forex'
        );
        $this->publishes([
            __DIR__.'/config/forex.php' => config_path('forex.php'),
        ]);
        $this->loadTranslationsFrom(__DIR__.'/lang', 'forex');
    }

    public function register(){

    }
}