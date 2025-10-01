<?php

namespace Aristonis\LaravelLanguageSwitcher\Helper\Traits;

trait HasSessionTrait
{

    public static function getLanguageSessionKey(): string
    {
        return config("language-switcher.session_key", "__lang");
    }

    public static function getLanguageFromSession(): ?string
    {
        return session()->get(self::getLanguageSessionKey()) ?? null;
    }
    public static function  setLanguageToSession($lang)
    {
        session([self::getLanguageSessionKey() => $lang]);
    }
}
