<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        if(!empty($id)){
            $categ = Categories::where('Categ_id', $id)->first();
            $catId = $categ->Id;

            $newArt = ArticleFactoryClass::getArticleList('new');
            $article = Article::where('categoty', $catId)->get();
            $data = ['article'=>$article, 'new'=>$newArt];
            return view('front/row-article', $data);
        } else {

        }
    }
}









