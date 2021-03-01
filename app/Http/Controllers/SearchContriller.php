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
use App\MyClasses\UtileClass;

class SearchContriller extends Controller
{
    public function index(Request $request){

        if(!empty($request->post('search')) && strlen($request->post('search')) < 50 && strlen($request->post('search')) > 2){
            $search = $request->post('search');
            $a = Article::search($search)->get();
            /*dd($a[0]->id);
            echo '<pre>'; print_r($a); die();*/

        } else {
            die('error');
        }

        $dataItemArray = null;
        if(!empty($a)){
            foreach($a as $item){
                if($item->user_groups){
                    $user_groups = UtileClass::getUserGroups();
                    if(is_array($user_groups)){
                        if(!in_array(1, $user_groups) && !in_array(6, $user_groups)){
                            $arrDiff = array_intersect(array_filter(explode(',',$item->user_groups)), $user_groups);
                            if(!$arrDiff){
                                continue;
                            }
                        }
                    } else {
                        continue;
                    }
                }
                $dataItemArray[] = $item;
            }
        }

        if(!empty($dataItemArray) && count($dataItemArray)>0){
            $data = ['article' => $dataItemArray];
        } else {
            $data = ['emp' => 'No results found!'];
        }


        return view('front/search', $data);

    }
}




