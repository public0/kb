<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $parents = [];
            $category = Category::where('id', $id)->first();
            if (!empty($category->tree)) {
                $parents = Category::whereIn('id', explode(',', $category->tree))->get();
            }

            $articles = Article::active()
                ->userRole(Auth::check() ? Auth::user()->role : null)
                ->where('lang', $this->lang)
                ->whereRaw("[categories_ids] LIKE '%,{$id},%'")
                ->orderBy('rank', 'DESC')
                ->orderBy('created_at', 'DESC')
                ->paginate(20);

            return view('front/category', compact('category', 'parents', 'articles'));
        } else {
            abort(404);
        }
    }
}
