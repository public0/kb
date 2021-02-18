<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ServiceController extends Controller
{
    public function getArticle(Request $request){
        $id = $request->id;
        if(empty($id)){
            return response()->json('Error', '001');  // empty id
        }

        $article = DB::select(
            DB::raw('select article.*, Categories.Name from article left join Categories on article.categoty = Categories.ID WHERE article.id = ?'),array($id)
        );

        if(empty($article)){
            return response()->json('no record found', '002');  // empty id
        }
        $article = $article[0];

        $data['title'] = $article->title;
        $data['description'] = $article->description;
        $data['body'] = $article->body;
        $data['categoty'] = $article->Name;
        $data['tags'] = $article->tags;
        $data['status'] = $article->status;
        $data['lang'] = $article->lang;
        $data['url'] = env('APP_URL').'/article/'.$article->article_id;
        $data['lang_parent_id'] = $article->lang_parent_id;

        return response()->json($data);
    }

    public function searchArticle(Request $request){
        $maxno = 15;
        $cnt_categ_imp = null;

        $keyw = $request->input('keywords');
        $categ = $request->input('categid');
        $categ_imp = implode($categ);
        $no = $request->input('articleno');
        $lang = $request->input('lang');

        $keyw = trim(str_replace(',',' ', $keyw));

        if(!empty($no) && (int)$no > 0){
            $maxno = (int)$no;
        }

        if(!empty($keyw)){
            if(!empty($categ)){
                if(!empty($lang)){
                    $art = Article::search($keyw)->whereIn('categoty',['1','24'])->where('lang', $lang)->where('status', 1)->get();
                } else {
                    $art = Article::search($keyw)->where('categoty', $categ)->where('status', 1)->get();
                }
            } else {
                if(!empty($lang)){
                    $art = Article::search($keyw)->where('lang', $lang)->where('status', 1)->get();
                } else {
                    $art = Article::search($keyw)->where('status', 1)->get();
                }
            }
        } else {
            if(!empty($categ)){
                if(!empty($lang)){
                    $art = DB::select(
                        DB::raw('select article.*, Categories.Name from article left join Categories on article.categoty = Categories.ID WHERE article.categoty = ? AND article.lang = ? AND article.status = 1'),array($categ, $lang)
                    );
                } else {
                    $art = DB::select(
                        DB::raw('select article.*, Categories.Name from article left join Categories on article.categoty = Categories.ID WHERE article.categoty = ? AND article.status = 1'),array($categ)
                    );
                }
            } else {
                if(!empty($lang)){
                    $art = DB::select(
                        DB::raw('select article.*, Categories.Name from article left join Categories on article.categoty = Categories.ID WHERE article.lang = ? AND article.status = 1'),array($lang)
                    );
                } else {
                    $art = DB::select(
                        DB::raw('select article.*, Categories.Name from article left join Categories on article.categoty = Categories.ID WHERE article.status = 1')
                    );
                }
            }
        }


        $date = [];

        if(empty($art)){
            return response()->json('no record found', '002');  // empty id
        }

        if(!empty($categ_imp) && is_array($categ_imp)){
            $cnt_categ_imp = count($categ_imp);
        }

        foreach ($art as $article){

            if($cnt_categ_imp){
                if($article->)

            }

            $data['title'] = $article->title;
            $data['description'] = $article->description;
            $data['body'] = $article->body;
            $data['categoty'] = $article->Name;
            $data['tags'] = $article->tags;
            $data['status'] = $article->status;
            $data['lang'] = $article->lang;
            $data['url'] = env('APP_URL').'/article/'.$article->article_id;
            $data['lang_parent_id'] = $article->lang_parent_id;

            $date[] = $data;
        }

        return response()->json($date);
    }
}
