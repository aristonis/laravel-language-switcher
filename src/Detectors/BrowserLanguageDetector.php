<?php

namespace Aristonis\LaravelLanguageSwitcher\Detectors;

use Aristonis\LaravelLanguageSwitcher\Contracts\LanguageDetectorInterface;
use Illuminate\Http\Request;

class BrowserLanguageDetector implements LanguageDetectorInterface
{
    /**
     * Detect language from the browser's Accept-Language header.
     */
    public function detect(Request $request): ?string
    {
      
        $supportedLanguages = config('language-switcher.supported_languages', config("language-switcher-switcher.defaut"));

        
        $browserLanguages = $request->getLanguages();

       
        foreach ($browserLanguages as $lang) {
           
            $primaryLang = substr($lang, 0, 2);

            if (in_array($primaryLang, array_keys($supportedLanguages))) {
                return $primaryLang;
            }
        }

        
        return null;
    }
}
