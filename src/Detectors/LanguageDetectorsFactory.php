<?php

namespace Aristonis\LaravelLanguageSwitcher\Detectors;


use Aristonis\LaravelLanguageSwitcher\Contracts\LanguageDetectorInterface;

class LanguageDetectorsFactory
{

    private static array $instances = [];

    public static function getDetector($name): ?LanguageDetectorInterface
    {
     
        if (isset(self::$instances[$name])) {
            return self::$instances[$name];
        }

        $detectors = config('language-switcher.detectors', []);

        if (!array_key_exists($name, $detectors)) {
            //    TODO : add throw Execption for NOT SUPPORT DETECTORS TYOE
            return null;
        }
        $detectorClass = $detectors[$name];
       

        $detector = new $detectorClass();
         

        if (!$detector instanceof LanguageDetectorInterface) {

            return null;
        }


        self::$instances[$name] = $detector;
        return $detector;
    }
}
