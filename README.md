# Laravel Language Switcher

[![Total Downloads](https://img.shields.io/packagist/dt/aristonis/laravel-language-switcher.svg)](https://packagist.org/packages/aristonis/laravel-language-switcher)

Auto-detects user language from browser/session and sets it for the Laravel application. Provides manual selection via a form component.

## Features

- Automatic language detection (browser, session, custom detectors).
- Session-based persistence.
- User profile integration for authenticated users.
- Blade component for language switcher.
- Configurable supported languages and detectors.

## Installation

1. Install via Composer:

   ```
   composer require aristonis/laravel-language-switcher
   ```

2. Publish config file:

   ```
   php artisan vendor:publish --provider="Aristonis\LaravelLanguageSwitcher\LaravelLanguageSwitcherServiceProvider" --tag="config"
   ```

3. Register middleware

4. Add route in `routes/web.php`:

   ```php
   Route::post('/language-switch', [\Aristonis\LaravelLanguageSwitcher\Http\Controllers\LanguageSwitchController::class, 'update'])->name('language-switch.update');
   ```

## Configuration

In `config/language-switcher.php`:

- `supported_languages`: Array of supported locales (e.g., `['en' => 'English', 'ar' => 'Arabic']`).
- `detectors`: Enabled detectors (e.g., `['browser']`).
- `session_key`: Session key for locale (default: `__lang`).

## Usage

### Middleware

Automatically sets `app()->setLocale()` on each request.

### Language Switcher Component

In Blade views:

```blade
<x-laravel-language-switcher-switcher />
```

### Detectors

- Browser: Detects from `Accept-Language` header.
- Custom:
  - Extends: `LanguageDetectorInterface`
  - add new class on config file with array `detectors`

### Manual Update

POST to `/language-switch` with `locale` field.

## Publishing Views

```
php artisan vendor:publish --provider="Aristonis\LaravelLanguageSwitcher\LaravelLanguageSwitcherServiceProvider" --tag="views"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Issues

Report issues at [GitHub Issues](https://github.com/aristonis/laravel-language-switcher/issues).

## Collaboration

Contributions welcome! Fork the repo, create a feature branch, and submit a pull request. See [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Email <aristonis@outlook.com> or report via [Issues](https://github.com/aristonis/laravel-language-switcher/issues).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Support

For support, open an [issue](https://github.com/aristonis/laravel-language-switcher/issues).
