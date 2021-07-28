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
        // Get language code
        if (!empty($_COOKIE['lang'])) {
            $lang = strtoupper($_COOKIE['lang']);
        } else {
            $lang = 'RO';
        }

        $appsModules = file_get_contents(resource_path() . DIRECTORY_SEPARATOR . 'modules_apps.json');
        $appsModules = json_decode($appsModules, true);
        View::share('appsModules', $appsModules);

        // Admin
        if (strpos(url()->current(), '/admin') !== false) {
            $lang = 'EN';
            $adminModules = file_get_contents(resource_path() . DIRECTORY_SEPARATOR . 'modules_admin.json');
            $adminModules = json_decode($adminModules, true);
            View::share('adminModules', $adminModules);
        }

        // Set app locale
        $this->lang = $lang;
        App::setLocale($lang);
        View::share('lang', strtolower($lang));
    }
}
