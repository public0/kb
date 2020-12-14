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
        $article = Article::all();
        $data = ['article'=>$article, 'new'=>$newArt];
        return view('front/row-article', $data);
    }
}










