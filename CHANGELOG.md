# Changelog

All notable changes to the `aristonis/laravel-language-switcher` package will be documented in this file.

## [1.0.0] - 2025-10-01

### Added

- Initial release of the Laravel Language Switcher package.
- Automatic language detection via browser `Accept-Language` header and session.
- Middleware (`SetLocalMiddleware`) to set application locale on each request.
- Blade component (`x-laravel-language-switcher-switcher`) for manual language selection.
- Configurable supported languages and detectors in `config/language-switcher.php`.
- Session-based locale persistence with `__lang` key.
- Support for custom language detectors via `LanguageDetectorInterface` and add it in config file.
- Controller (`LanguageSwitchController`) for handling locale updates via POST requests.
