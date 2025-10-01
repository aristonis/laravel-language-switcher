<?php

namespace Aristonis\LaravelLanguageSwitcher\Views\Components;

use Aristonis\LaravelLanguageSwitcher\Helper\Helper;
use Illuminate\View\Component;

class Switcher extends Component
{
    public $currentLanguage;
    public $supportedLanguages;

    public function __construct()
    {
        $this->supportedLanguages = Helper::getSupportedLangauges();
        $this->currentLanguage = Helper::getLanguageFromSession();
    }

    public function render()
    {
        return view('laravel-language-switcher::components.switcher');
    }
}
