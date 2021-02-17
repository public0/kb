<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Cookie;
use App\MyClasses\UtileClass;

class HomeController extends Controller
{
    public function index(Request $request){
        $lang = UtileClass::getLang();
        //$newArt = ArticleFactoryClass::getArticleList('asoc',['id'=>2]);
        //$newArt = ArticleFactoryClass::getArticleList('new');
        $article = Article::where('status', 1)->where('lang', $lang)->orderBy('created_at','desc')->paginate(20);
        if(empty($article)){
            $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!'];
            return view('front/row-article', $data);
        }
        $data = ['article'=>$article];
        return view('front/row-article', $data);
    }
}










