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

class ArticleContriller extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $newArt = ArticleFactoryClass::getArticleList('new');
        $article = Article::where('article_id', $id)->get();
        if(empty($article[0]->id)){
            return abort(404);
        }
        $comments = Comments::where('Article_id', $article[0]->id)->orderBy('created_at','desc')->get();


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
                if(!empty($article[0]->id)){
                    $coment = new Comments();
                    $coment->Name = $request->post('name');
                    $coment->Email = $request->post('email');
                    $coment->Comment = $request->post('msg');
                    $coment->Status = 1;
                    $coment->Article_id = $article[0]->id;
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


        $assocArt = ArticleFactoryClass::getArticleList('asoc',['id'=>$article[0]->id]);
        $data = ['article'=>$article[0], 'new'=>$newArt, 'assoc'=>$assocArt, 'comments'=>$comments];
        return view('front/article', $data);
    }
}




