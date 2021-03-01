<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comments;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\MyClasses\UtileClass;

class ArticleController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        //$newArt = ArticleFactoryClass::getArticleList('new');
        $article = Article::where('article_id', $id)->first();
        //dd($article->categories->name);
        if(empty($article->id)){
            return abort(404);
        }

        //check permisions
        if(!empty($article->user_groups)){
            $user_groups = UtileClass::getUserGroups();
            if(is_array($user_groups)){
                if(!in_array(1, $user_groups) && !in_array(6, $user_groups)){
                    $arrDiff = array_intersect(array_filter(explode(',',$article->user_groups)), $user_groups);
                    if(!$arrDiff){
                        return abort(404);
                    }
                }
            } else {
                return abort(404);
            }
        }

        $comments = Comments::where('Article_id', $article->id)->orderBy('created_at','desc')->get();


        if(!empty($_POST)){
            $validator = Validator::make($request->post(), [
                'msg' => 'required|max:255',
                'name' => 'required|max:100',
                'email' => 'required|email|max:100',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if(!empty($article->id)){
                    $coment = new Comments();
                    $coment->Name = $request->post('name');
                    $coment->Email = $request->post('email');
                    $coment->Comment = $request->post('msg');
                    $coment->Status = 1;
                    $coment->Article_id = $article->id;
                    $coment->save();
                    return Redirect::back()->with('message','Operation Successful !');
                }
            }
        }


        /*print_r($request->session()->all());
        $array_session_vew = [];
        if ($request->session()->exists('view_art')) {
            $array_session_vew =  $request->session()->get('view_art');
        }
        $array_session_vew[] = $id;
        $request->session()->put('view_art', $array_session_vew);
        die();*/


        $assocArt = ArticleFactoryClass::getArticleList('asoc',['id'=>$article->id]);
        $data = ['article'=>$article, 'assoc'=>$assocArt, 'comments'=>$comments];
        return view('front/article', $data);
    }
}




