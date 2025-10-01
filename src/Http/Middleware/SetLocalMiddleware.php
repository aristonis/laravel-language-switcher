<?php

namespace Aristonis\LaravelLanguageSwitcher\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Aristonis\LaravelLanguageSwitcher\Detectors\LanguageDetectorsFactory;
class SetLocalMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
            return $next($request);
        }
        $detectorStrategies = config('language-switcher.detectors');

        foreach ($detectorStrategies as $strategyName => $class) {

            $detector = LanguageDetectorsFactory::getDetector($strategyName);

            if ($detector) {
                $detectedLanguage = $detector->detect($request);
               

                if ($detectedLanguage) {
                    app()->setLocale($detectedLanguage);
                    session(['locale' => $detectedLanguage]);
                    return $next($request);
                }
            }
        }

        return $next($request);
    }
}
