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
            return response()->json('Error 001');  // empty id
        }

        $article = DB::select(
            DB::raw('select article.*, Categories.Name from article left join Categories on article.categoty = Categories.ID WHERE article.id = ?'),array($id)
        );

        if(empty($article)){
            return response()->json('no record found 002');  // empty id
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
        $categ_imp = null;
        $cnt_categ_imp = null;
        $lang_imp = null;
        $cnt_lang_imp = null;
        $keyw = null;
        $categ =null;
        $no = null;
        $lang = null;

        $keyw = $request->input('keywords');   //keywords
        $categ = $request->input('categid');   //category list
        $no = $request->input('articleno');    //limit
        $lang = $request->input('lang');       //lang list

        $keyw = trim(str_replace(',',' ', $keyw));

        if(!empty($no) && (int)$no > 0){
            $maxno = (int)$no;
        }

        if(!empty($categ)){
            $categ_imp = explode(',',$categ);
            if(is_array($categ_imp)){
                $cnt_categ_imp = count($categ_imp);
            }
        }

        if(!empty($lang)){
            $lang_imp = explode(',',$lang);
            if(is_array($lang_imp)){
                $cnt_lang_imp = count($lang_imp);
            }
        }


        if(!empty($keyw)){
            try {
                    if(!empty($categ)){
                        if(!empty($lang)){
                            if($cnt_lang_imp == 1)
                                $art = Article::search($keyw)->where('categoty',$categ)->where('status', 1)->get();
                            if($cnt_categ_imp != 1)
                                $art = Article::search($keyw)->where('status', 1)->get();
                        } else {
                            if($cnt_categ_imp == 1)
                                $art = Article::search($keyw)->where('categoty', $categ)->where('status', 1)->get();
                            if($cnt_categ_imp != 1)
                                $art = Article::search($keyw)->where('status', 1)->get();
                        }
                    } else {
                        /*if(!empty($lang)){
                            if($cnt_lang_imp == 1)
                            $art = Article::search($keyw)->where('lang', $lang)->where('status', 1)->get();
                            if($cnt_lang_imp != 1)
                                $art = Article::search($keyw)->where('status', 1)->get();
                        } else {*/
                            $art = Article::search($keyw)->where('status', 1)->get();

                    }

                //$art = Article::search($keyw)->where('status', 1)->get();
            } catch (\Exception $e){
                return response()->json('DB error 003');
            }
            /*echo '<pre>'; print_r($art); die();*/

        } else {
            try{
                if(!empty($categ)){
                    if(!empty($lang)){
                        $art = DB::table('article')
                            ->leftJoin('Categories', 'article.categoty', '=', 'Categories.ID')
                            ->select('article.*','Categories.Name')
                            ->where('article.status', '1')
                            ->whereIn('article.categoty',$categ_imp)
                            ->whereIn('article.lang',$lang_imp)
                            ->paginate($maxno);

                    } else {
                        $art = DB::table('article')
                            ->leftJoin('Categories', 'article.categoty', '=', 'Categories.ID')
                            ->select('article.*','Categories.Name')
                            ->where('article.status', '1')
                            ->whereIn('article.categoty',$categ_imp)
                            ->paginate($maxno);
                    }
                } else {
                    if(!empty($lang)){
                        $art = DB::table('article')
                            ->leftJoin('Categories', 'article.categoty', '=', 'Categories.ID')
                            ->select('article.*','Categories.Name')
                            ->where('article.status', '1')
                            ->whereIn('article.lang',$lang_imp)
                            ->paginate($maxno);
                    } else {
                        $art = DB::table('article')
                            ->leftJoin('Categories', 'article.categoty', '=', 'Categories.ID')
                            ->select('article.*','Categories.Name')
                            ->where('article.status', '1')
                            ->paginate($maxno);
                    }
                }
            } catch (\Exception $e){
                return response()->json('DB error 003');
            }
        }


        $date = [];

        if(empty($art) || count($art) == 0){
            return response()->json('no record found 002');  // empty id
        }


        $cnt = 0;
        foreach ($art as $article){
            if($cnt == $maxno){
                break;
            }

           if($cnt_categ_imp > 0){
                if(!in_array($article->categoty , $categ_imp)){
                    continue;
                }
           }

            if($cnt_lang_imp > 0){
                if(!in_array($article->lang, $lang_imp)){
                    continue;
                }
            }

            $data['article_id'] = $article->article_id;
            $data['title'] = $article->title;
            $data['description'] = $article->description;
            $data['body'] = $article->body;
            $data['categoty'] = $article->categoty;
            $data['tags'] = $article->tags;
            $data['status'] = $article->status;
            $data['lang'] = $article->lang;
            $data['url'] = env('APP_URL').'/article/'.$article->article_id;
            $data['lang_parent_id'] = $article->lang_parent_id;

            $date[] = $data;
            $cnt++;
        }

        return response()->json($date);
    }
}
