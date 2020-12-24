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
            /*$categ = Categories::where('Categ_id', $id)->first();
            $catId = $categ->Id;*/
            $catId = $id;

            $newArt = ArticleFactoryClass::getArticleList('new');
            $article = Article::where(['categoty'=> $catId, 'status'=> 1])->get();
            if(empty($article)){
                $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!'];
                return view('front/row-article', $data);
            }
            $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!'];
            return view('front/row-article', $data);
        } else {

        }
    }
}










