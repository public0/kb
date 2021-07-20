<?php

namespace App\Http\Controllers;

use App\Actions\CategoriesTrait;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use CategoriesTrait;

    private $allSubcategories = [];

    private function createCategoryTree($categories)
    {
        foreach ($categories as $k => $category) {
            if (!empty($category['child'])) {
                $this->createCategoryTree($category['child']);
            }
            $this->allSubcategories[] = (int)$category['id'];
        }
    }

    public function index(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $parents = [];
            $category = Category::where('id', $id)->first();
            if (!empty($category->tree)) {
                $parents = Category::whereIn('id', explode(',', $category->tree))->get();
            }

            $this->createCategoryTree($this->getCategoriesTree($id));
            $where = ["[categories_ids] LIKE '%,{$id},%'"];
            foreach ($this->allSubcategories as $scid) {
                $where[] = "[categories_ids] LIKE '%,{$scid},%'";
            }

            $articles = Article::active()
                ->distinct()
                ->userRole(Auth::check() ? Auth::user()->role : null)
                ->where('lang', $this->lang)
                ->whereRaw('(' . implode(' OR ', $where) . ')')
                ->orderBy('rank', 'DESC')
                ->orderBy('created_at', 'DESC')
                ->paginate(20);

            return view('front/category', compact('category', 'parents', 'articles'));
        } else {
            abort(404);
        }
    }
}
