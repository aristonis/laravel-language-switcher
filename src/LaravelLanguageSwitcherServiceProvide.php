<?php

namespace Aristonis\LaravelLanguageSwitcher;

use Illuminate\Support\ServiceProvider;

class LaravelLanguageSwitcherServiceProvide extends ServiceProvider
{
    public function register()
    {
        //register
    }

    public function boot()
    {


        $this->publishes([
            __DIR__ . '/../config/language-switcher.php' => config_path('language-switcher.php'),
        ], 'config');


        $this->mergeConfigFrom(
            __DIR__ . '/../config/language-switcher.php',
            'language-switcher'
        );
    }
}
