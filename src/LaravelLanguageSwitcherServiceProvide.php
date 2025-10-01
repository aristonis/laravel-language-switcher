<?php

namespace Aristonis\LaravelLanguageSwitcher;

use Aristonis\LaravelLanguageSwitcher\Views\Components\Switcher;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelLanguageSwitcherServiceProvide extends ServiceProvider
{
    public function register()
    {
        //register
    }

    public function boot()
    {
        $this->publishConfig();
        $this->publishViews();
        $this->loadViews();

        $this->loadViewComponentsAs('laravel-language-switcher', [
            'switcher' => Switcher::class,
        ]);


        $this->mergeConfigFrom(
            __DIR__ . '/../config/language-switcher.php',
            'language-switcher'
        );
    }
    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/language-switcher.php' => config_path('language-switcher.php'),
        ], 'config');
    }

    public function loadViews()
    {

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-language-switcher');
    }
    private function publishViews()
    {
        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-language-switcher'),
        ], 'views');
    }
}
