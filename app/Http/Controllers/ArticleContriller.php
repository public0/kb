<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleContriller extends Controller
{
    public function index($id){
        $article = Article::where('article_id', $id)->get();
        $data = ['article'=>$article[0]];
        return view('front/article', $data);
    }
}




