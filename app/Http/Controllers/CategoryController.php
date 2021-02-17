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
        $parents_category = null;
        if(!empty($id)){
            $categ = Categories::where('Id', $id)->first();
            if(!empty($categ->Tree)){
                $parents_id = explode(',',$categ->Tree);
                $parents_category = Categories::whereIn('Id', $parents_id)->get();
            }

            $newArt = ArticleFactoryClass::getArticleList('new');
            $article = Article::where(['categoty'=> $id, 'status'=> 1])->get();
            if(empty($article)){
                $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!'];
                return view('front/row-article', $data);
            }
            $data = ['article'=>$article, 'new'=>$newArt, 'msg'=>'No results found!', 'parents' => $parents_category, 'categ_id' => $id];
            return view('front/category-article', $data);
        } else {
            abort(404);
        }
    }
}










