<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
    public function index($lang)
    {
        if (session()->get('locale') != $lang) {
            session()->put('locale', $lang);
        }
        app()->setLocale(session('locale'));

        return app()->getLocale();
    }
}
