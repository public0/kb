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
                ->userGroups(Auth::check() ? Auth::user()->my_groups : [])
                ->where(['category_id' => $id, 'lang' => $this->lang])
                ->paginate(20);
            $data = [
                'articles' => $articles,
                'parents' => $parents,
                'category' => $category
            ];

            return view('front/category', $data);
        } else {
            abort(404);
        }
    }
}
