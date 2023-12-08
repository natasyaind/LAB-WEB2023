<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function switch($language = 'en')
    {
        request()->session()->put('locale', $language);
        return redirect()->back();
    }
}
