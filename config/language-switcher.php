<?php

return [
    /**
     * ===================================
     * defain all languges that support on you site  
     * this values will show on language selector dorp down item
     * ====================================
     */
    "supported_languages" => ['ar' => "Arabic", 'en' => "English"],

    /**
     * ===================================
     * default language will set if detected faild or user language not on map set
     * ====================================
     */
    "default" => config('app.local', 'En'),
    /**
     * ===================================
     * select how want to detected user language 
     *  avilable method  [browser]
     * ====================================
     */
    'detectors' => [
        'browser' => \Aristonis\LaravelLanguageSwitcher\Detectors\BrowserLanguageDetector::class,
    ],

    /**
     *  session key 
     */
    "session_key" => "__lang",
    /**
     * Routes
     */
    "route" => [
        'prefix' => 'language-switcher',
        'name' => 'language-switcher.'
    ]
];
