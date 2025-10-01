<?php

namespace Aristonis\LaravelLanguageSwitcher\Helper\Traits;

trait HasRouteTrait
{
    public static function getRoutePrefix(): string
    {
        return config('language-switcher.route.prefix', 'language-switcher');
    }
    public static function getRoutePrefixName(): string
    {
        return config('language-switcher.route.name', 'language-switcher.');
    }
}
