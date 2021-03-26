<?php

namespace App\Http\Controllers;

use App\MyClasses\UtileClass;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $lang;

    public function __construct()
    {
        // Set app locale
        if (!empty($_COOKIE['lang'])) {
            $lang = strtoupper($_COOKIE['lang']);
        } else {
            $lang = 'RO';
        }

        $this->lang = $lang;
        App::setLocale($lang);
        View::share('lang', strtolower($lang));
    }
}
