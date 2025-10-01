<?php

namespace Aristonis\LaravelLanguageSwitcher\Contracts;

use Illuminate\Http\Request;

interface LanguageDetectorInterface
{
    /**
     * Attempt to detect the language from the request.
     *
     * @param Request $request
     * @return string|null The detected language code (e.g., 'en', 'ar'), or null if detection fails.
     */
    public function detect(Request $request): ?string;
}