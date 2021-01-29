<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserGroups;

class NewsletterController extends Controller
{
    public function index(){
        $newsletter = DB::table('Newsletter')->get();
        $data= ['newsletter'=> $newsletter];
        return view('admin/newsletter', $data);
    }

}
