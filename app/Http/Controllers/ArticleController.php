<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $article = Article::where('article_id', $request->id)
            ->where('status', $request->query('preview') ? 0 : 1)
            ->first();
        if (empty($article->id)) {
            return abort(404);
        }

        // Check permisions
        if (!empty($article->user_groups)) {
            $userGroups = Auth::check() ? Auth::user()->my_groups : [];
            if ($userGroups) {
                if (count(array_intersect([1, 6], $userGroups)) == 0) {
                    if (!array_intersect(array_filter(explode(',', $article->user_groups)), $userGroups)) {
                        return abort(404);
                    }
                }
            } else {
                return abort(404);
            }
        }

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->post(), [
                'comment_text' => 'required|max:1500',
                'comment_name' => 'required|max:100',
                'comment_email' => 'required|email|max:255'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator, 'comment')
                    ->withInput();
            } else {
                if (!empty($article->id)) {
                    $coment = new Comment;
                    $coment->name = $request->post('comment_name');
                    $coment->email = $request->post('comment_email');
                    $coment->comment = $request->post('comment_text');
                    $coment->status = 0;
                    $coment->article_id = $article->id;
                    $coment->save();

                    return Redirect::back()->with('message', 'Operation Successful !');
                }
            }
        }

        $assoc = ArticleFactoryClass::getArticleList('asoc', ['id' => $article->id, 'tags' => $article->tags]);
        $comments = Comment::active()->where('article_id', $article->id)->orderBy('created_at', 'desc')->get();

        return view('front/article', compact('article', 'assoc', 'comments'));
    }

    public function helpView(Request $request)
    {
        $article = Article::find($request->id);
        if (empty($article->id)) {
            return abort(404);
        }

        return view('front/help-article-view', compact('article'));
    }
}
