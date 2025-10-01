<?php

namespace Aristonis\LaravelLanguageSwitcher\Http\Controllers;

use Aristonis\LaravelLanguageSwitcher\Helper\Helper;
use Exception;
use Illuminate\Http\Request;


class LanguageSwitchController extends Controller
{

    public function update(Request $request)
    {

        $request->validate([

            'locale' => [
                'required',
                'string',

                'in:' . implode(',', array_keys(Helper::getSupportedLangauges()))
            ],
        ]);

        session([Helper::getLanguageSessionKey() => $request->locale]);
        app()->setLocale($request->locale);

        return redirect()->to(url()->previous());
    }
}
