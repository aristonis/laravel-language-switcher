<?php

namespace Aristonis\LaravelLanguageSwitcher\Helper\Traits;

trait HasSupportLangaugesTrait
{
    public static function getSupportedLangauges()
    {
        return config('language-switcher.supported_languages', ['en' => "English"]);
    }
}
