<?php

use Aristonis\LaravelLanguageSwitcher\Helper\Helper;
use Aristonis\LaravelLanguageSwitcher\Http\Controllers\LanguageSwitchController;
use Aristonis\LaravelLanguageSwitcher\Http\Middleware\SetLocalMiddleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => Helper::getRoutePrefix(),
    'as' => Helper::getRoutePrefixName(),
    'middleware' => ['web']
], function () {
    Route::post('/update', [LanguageSwitchController::class, 'update'])
        // Route::post('/update', function () {
        //     Log::debug("LanguageSwitch Route: Session ID: " . session()->getId());
        //     return redirect()->back();
        // })
        ->name('update')
    ;
});
