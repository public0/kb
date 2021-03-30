<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * @param Request $request
     * @return JSON
     */
    public function list(Request $request)
    {
        $select = $request->query('select', '*');
        if ($select != '*') {
            $select = array_map('trim', explode(',', $select));
        }
        $articles = Article::select($select);

        $lang = $request->query('lang');
        if ($lang) {
            $articles->where('lang', $lang);
        }

        $langNot = $request->query('lang_not');
        if ($langNot) {
            $articles->where('lang', '<>', $langNot);
        }

        $term = $request->query('term');
        if ($term) {
            $articles->whereRaw("title LIKE '%{$term}%'");
        }

        return response()->json([
            'articles' => $articles->get()
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JSON
     */
    public function item(Request $request, $id)
    {
        $select = $request->query('select', '*');
        if ($select != '*') {
            $select = array_map('trim', explode(',', $select));
        }
        $article = Article::select($select);

        return response()->json([
            'article' => $article->find($id)
        ]);
    }
}
