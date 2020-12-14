<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;

class ArticleContriller extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        /*print_r($request->session()->all());
        $array_session_vew = [];
        if ($request->session()->exists('view_art')) {
            $array_session_vew =  $request->session()->get('view_art');
        }
        $array_session_vew[] = $id;
        $request->session()->put('view_art', $array_session_vew);
        die();*/

        $newArt = ArticleFactoryClass::getArticleList('new');
        $article = Article::where('article_id', $id)->get();
        $assocArt = ArticleFactoryClass::getArticleList('asoc',['id'=>$article[0]->id]);
        $data = ['article'=>$article[0], 'new'=>$newArt, 'assoc'=>$assocArt];
        return view('front/article', $data);
    }
}




