<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        //$newArt = ArticleFactoryClass::getArticleList('asoc',['id'=>2]);
        $newArt = ArticleFactoryClass::getArticleList('new');
        $article = Article::where('status', 1)->orderBy('created_at','desc')->get();
        if(empty($article)){
            $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!'];
            return view('front/row-article', $data);
        }
        $data = ['article'=>$article, 'new'=>$newArt];
        return view('front/row-article', $data);
    }
}










