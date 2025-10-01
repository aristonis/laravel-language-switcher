<?php

namespace Aristonis\LaravelLanguageSwitcher\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Aristonis\LaravelLanguageSwitcher\Detectors\LanguageDetectorsFactory;
use Aristonis\LaravelLanguageSwitcher\Helper\Helper;
use PHPUnit\TextUI\Help;

class SetLocalMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

        if (session()->has(Helper::getLanguageSessionKey())) {
            app()->setLocale(Helper::getLanguageFromSession());
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
