<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comments;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SearchContriller extends Controller
{
    public function index(Request $request){

        if(!empty($request->post('search')) && strlen($request->post('search')) < 50 && strlen($request->post('search')) > 2){
            $search = $request->post('search');
            $a = Article::search($search)->get();
            /*dd($a[0]->id);
            echo '<pre>'; print_r($a); die();*/
            if(!empty($a) && count($a)>0){
                $data = ['article' => $a];
            } else {
                $data = ['emp' => 'No results found!'];
            }
        } else {
            die('error');
        }
        return view('front/search', $data);

    }
}




