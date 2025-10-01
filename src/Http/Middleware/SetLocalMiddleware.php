<?php

namespace Aristonis\LaravelLanguageSwitcher\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Aristonis\LaravelLanguageSwitcher\Detectors\LanguageDetectorsFactory;
use Aristonis\LaravelLanguageSwitcher\Helper\Helper;
use Illuminate\Support\Facades\Log;
use PHPUnit\TextUI\Help;

class SetLocalMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

        $sessionKey = Helper::getLanguageSessionKey();


        if (session()->has($sessionKey)) {
            $languageFromSession = session()->get($sessionKey);
            app()->setLocale($languageFromSession);
            return $next($request);
        }

        $detectorStrategies = config('language-switcher.detectors');

        foreach ($detectorStrategies as $strategyName => $class) {
            $detector = LanguageDetectorsFactory::getDetector($strategyName);
            if ($detector) {
                $detectedLanguage = $detector->detect($request);
                if ($detectedLanguage) {
                    app()->setLocale($detectedLanguage);
                    Helper::setLanguageToSession($detectedLanguage);
                  
                    return $next($request);
                }
            }
        }

        return $next($request);
    }
}
