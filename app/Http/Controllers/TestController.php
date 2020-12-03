<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        //phpinfo(); die();
        $users = DB::table('dbo.test')->distinct()->get();
        print_r($users);
    }
}
