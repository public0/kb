<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Cookie;
use App\MyClasses\UtileClass;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $lang = UtileClass::getLang();
        $user_groups = UtileClass::getUserGroups();
        $like = '(';
        if($user_groups && !in_array([1,6], $user_groups)){
            for($i=0;$i < count($user_groups);$i++){
                if($i == 0){
                    $like .= "user_groups like '%,".$user_groups[$i].",%' ";
                } else {
                    $like .= "or user_groups like '%,".$user_groups[$i].",%' ";
                }
            }
            $like .= ')';

            $article = Article::where('status', 1)->whereRaw($like)->where('lang', $lang)->orderBy('created_at','desc')->paginate(20);
        } else {
            $article = Article::where('status', 1)->where('lang', $lang)->where('user_groups',null)->orderBy('created_at','desc')->paginate(20);
        }

        //$newArt = ArticleFactoryClass::getArticleList('asoc',['id'=>2]);
        //$newArt = ArticleFactoryClass::getArticleList('new');
        if(empty($article)){
            $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!'];
            return view('front/row-article', $data);
        }
        $data = ['article'=>$article, 'msg'=>'No results found!'];
        return view('front/row-article', $data);
    }
}










