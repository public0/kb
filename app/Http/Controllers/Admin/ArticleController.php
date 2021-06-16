<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Countries;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCountry;
use App\Models\Category;
use App\Models\Language;
use App\Models\UserGroups;
use App\MyClasses\UtileClass;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use Countries;

    public function index(Request $request)
    {
        $articles = Article::select(
            'id',
            'title',
            'lang',
            'tags',
            'created_at',
            'status',
            'article_id',
            'in_right_col',
            'lang_parent_id'
        )
            ->commentsNumber()
            ->orderBy('lang_parent_id', 'asc');

        $filters = ['category' => null, 'language' => null, 'status' => null];
        if ($request->isMethod('get')) {
            if ($request->filled('category')) {
                $filters['category'] = $request->input('category');
                $articles->where('categories_ids', 'LIKE', ',' . $filters['category'] . ',');
            }
            if ($request->filled('language')) {
                $filters['language'] = $request->input('language');
                $articles->where('lang', $filters['language']);
            }
            if ($request->filled('status')) {
                $filters['status'] = $request->input('status');
                $articles->where('status', $filters['status']);
            }
        }

        $articles = $articles->get();
        $categories = Category::active()->get();
        $languages = Language::all();

        return view('admin/article', compact('articles', 'categories', 'languages', 'filters'));
    }

    public function status($id)
    {
        try {
            $article = Article::where('id', $id);
            $data = $article->first();
            $article->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function rightCol($id)
    {
        try {
            $article = Article::where('id', $id);
            $data = $article->first();
            $article->update([
                'in_right_col' => 1 - $data->in_right_col
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function add(Request $request)
    {
        $user_groups = UserGroups::active()->get();
        $categories = Category::active()->get();
        $language = Language::all();
        $data = [
            'categories' => $categories,
            'language' => $language,
            'countries' => $this->getAllCountries(),
            'user_groups' => $user_groups
        ];

        if (!empty($_POST)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = trim($_POST['body']);
            $category_id = !empty($_POST['categories_ids']) ? $_POST['categories_ids'][0] : null;
            $categories_ids = $_POST['categories_ids'] ?? null;
            $tags = $_POST['tags'] ?? null;
            $status = $_POST['status'];
            $lang = $_POST['lang'];
            $rank = $_POST['rank'];
            $lang_parent_id = $_POST['lang_parent_id'] ?? null;
            $u_groups = $_POST['user_groups'] ?? [];
            $in_right_col = $_POST['in_right_col'];

            $validated = $request->validate([
                'countries' => 'required',
                'lang' => 'required|max:255',
                'title' => 'required|max:255|unique:' . Article::class,
                'description' => 'required|max:255',
                'body' => 'required',
                'tags' => 'max:255',
                'status' => 'required|integer|max:1'
            ]);

            $articleID = null;
            if (!empty($lang_parent_id)) {
                $parent = Article::select('id', 'lang', 'article_id')->find($lang_parent_id);
                if ($parent) {
                    $lang_parent_id = $parent->id;
                    $articleID = $parent->article_id;
                    if ($parent->lang == $lang) {
                        return redirect()->back()->with('error', 'It is the same language as the parent!');
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid parent id !');
                }
            }

            try {
                $art = new Article;
                $art->title = $title;
                $art->description = $description;
                $art->body = $body;
                $art->category_id = $category_id;
                $art->categories_ids = $categories_ids ? ',' . implode(',', $categories_ids) . ',' : null;
                $art->tags = $tags ? ',' . implode(',', $tags) . ',' : null;
                $art->lang = $lang;
                $art->status = $status;
                $art->lang_parent_id = $lang_parent_id;
                $art->rank = $rank;
                $art->user_groups = $u_groups ? ',' . implode(',', $u_groups) . ',' : null;
                $art->in_right_col = $in_right_col;
                $art->save();
                $last_id = $art->id;

                if (!empty($last_id)) {
                    $art->article_id = $articleID ?? 'AT' . strtoupper(dechex($last_id));
                    $art->save();
                }

                $deletedRows = ArticleCountry::where('article_id', $last_id);
                $deletedRows->delete();
                foreach ($request->input('countries', []) as $country) {
                    ArticleCountry::create([
                        'article_id' => $last_id,
                        'country_code' => $country
                    ]);
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/article')->with('message', 'Operation Successful !');
        }

        return view('admin/article-add', $data);
    }

    public function edit(Request $request, $id)
    {
        $user_groups = UserGroups::active()->get();
        $categories = Category::active()->get();
        $language = Language::all();
        $article = Article::find($id);
        $article->categories_ids = array_filter(explode(',', $article->categories_ids));
        $article->tags = array_filter(explode(',', $article->tags));
        $article->user_groups = array_filter(explode(',', $article->user_groups));

        $data = [
            'article' => $article,
            'categories' => $categories,
            'language' => $language,
            'countries' => $this->getAllCountries(),
            'user_groups' => $user_groups
        ];
        if ($article->lang_parent_id) {
            $data['article_lang'] = Article::select('id', 'title')->find($article->lang_parent_id);
        }

        if (!empty($_POST)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = trim($_POST['body']);
            $category_id = !empty($_POST['categories_ids']) ? $_POST['categories_ids'][0] : null;
            $categories_ids = $_POST['categories_ids'] ?? null;
            $tags = $_POST['tags'] ?? null;
            $status = $_POST['status'];
            $lang = $_POST['lang'];
            $lang_parent_id = $_POST['lang_parent_id'] ?? null;
            $rank = $_POST['rank'];
            $u_groups = $_POST['user_groups'] ?? [];
            $in_right_col = $_POST['in_right_col'];
            $article_id = UtileClass::generateId(new Article, 'article_id');

            if (strtolower($title) != strtolower($article->title)) {
                $validated = $request->validate([
                    'countries' => 'required',
                    'lang' => 'required|max:255',
                    'title' => 'required|max:255|unique:' . Article::class,
                    'description' => 'required|max:255',
                    'body' => 'required',
                    'tags' => 'max:255',
                    'status' => 'required|integer|max:1'
                ]);
            } else {
                $validated = $request->validate([
                    'countries' => 'required',
                    'lang' => 'required|max:255',
                    'title' => 'required|max:255',
                    'description' => 'required|max:255',
                    'body' => 'required',
                    'tags' => 'max:255',
                    'status' => 'required|integer|max:1'
                ]);
            }

            $articleID = $article->article_id;
            if (!empty($lang_parent_id)) {
                $parent = Article::select('id', 'lang', 'article_id')->find($lang_parent_id);
                if ($parent) {
                    $lang_parent_id = $parent->id;
                    $articleID = $parent->article_id;
                    if ($parent->lang == $lang) {
                        return redirect()->back()->with('error', 'It is the same language as the parent!');
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid parent id !');
                }
            }

            try {
                Article::where('id', $article->id)->update([
                    'title' => $title,
                    'description' => $description,
                    'body' => $body,
                    'category_id' => $category_id,
                    'categories_ids' => $categories_ids ? ',' . implode(',', $categories_ids) . ',' : null,
                    'tags' => $tags ? ',' . implode(',', $tags) . ',' : null,
                    'lang' => $lang,
                    'status' => $status,
                    'rank' => $rank,
                    'user_groups' => $u_groups ? ',' . implode(',', $u_groups) . ',' : null,
                    'lang_parent_id' => $lang_parent_id,
                    'article_id' => $articleID,
                    'in_right_col' => $in_right_col
                ]);

                $deletedRows = ArticleCountry::where('article_id', $article->id);
                $deletedRows->delete();
                foreach ($request->input('countries', []) as $country) {
                    ArticleCountry::create([
                        'article_id' => $article->id,
                        'country_code' => $country
                    ]);
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/article')->with('message', 'Operation Successful !');
        }

        return view('admin/article-edit', $data);
    }

    public function categories()
    {
        $categories = Category::orderBy('tree', 'asc')->orderBy('name', 'asc')->get();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]->ind = substr_count($categories[$i]->tree, ',');
        }

        return view('admin/art-categories', compact('categories'));
    }

    public function categoryStatus($id)
    {
        try {
            $category = Category::where('id', $id);
            $data = $category->first();
            $category->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function categoryAdd(Request $request)
    {
        $language = Language::all();
        $categs = Category::all();
        $data = [
            'language' => $language,
            'categs' => $categs
        ];

        if (!empty($_POST)) {
            $name = $_POST['name'];
            $lang = $_POST['lang'];
            $parent_id = $_POST['parent_id'];
            $status = $_POST['status'];
            $categ_id = UtileClass::generateId(new Category, 'categ_id');

            $validated = $request->validate([
                'name' => 'required|max:255|unique:' . Category::class,
                'lang' => 'required|max:255',
                'status' => 'required|integer|max:1',
                'parent_id' => 'integer'
            ]);

            try {
                $cat = new Category;
                $cat->name = $name;
                $cat->lang = $lang;
                $cat->parent_id = $parent_id;
                $cat->status = $status;
                $cat->categ_id = $categ_id;
                $cat->save();
                $my_id = $cat->id;

                $parent_tree = null;
                if (!empty($parent_id)) {
                    $parent_tree = Category::where('id', $parent_id)->first()->tree;
                }
                if (!empty($my_id)) {
                    $myTree = (!empty($parent_tree)) ? $parent_tree.','.$my_id : $my_id;
                    Category::where('id', $my_id)->update(['tree' => $myTree]);
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/categories')->with('message', 'Operation Successful !');
        }

        return view('admin/art-category-add', $data);
    }

    public function categoryEdit(Request $request)
    {
        $id = $request->id;
        $language = Language::all();
        $categs = Category::all();
        $category = Category::where('id', $id)->first();
        if (empty($category)) {
            return redirect()->back()->with('error', 'No category!');
        }
        $data = [
            'language' => $language,
            'categs' => $categs,
            'category' => $category
        ];
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $lang = $_POST['lang'];
            $parent_id = $_POST['parent_id'];
            $status = $_POST['status'];
            $categ_id = UtileClass::generateId(new Category, 'categ_id');

            if (strtolower($name) != strtolower($category->name)) {
                $validated = $request->validate([
                    'name' => 'required|max:255|unique:' . Category::class,
                    'lang' => 'required|max:255',
                    'status' => 'required|integer|max:1',
                    'parent_id' => 'integer'
                ]);
            } else {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'lang' => 'required|max:255',
                    'status' => 'required|integer|max:1',
                    'parent_id' => 'integer'
                ]);
            }

            try {
                Category::where('id', $id)->update([
                    'name' => $name,
                    'lang' => $lang,
                    'parent_id' => $parent_id,
                    'status' => $status,
                    'categ_id' => $categ_id
                ]);

                $parent_tree = null;
                if (!empty($parent_id)) {
                    $parent_tree = Category::where('id', $parent_id)->first()->tree;
                }
                if (!empty($id)) {
                    $myTree = (!empty($parent_tree)) ? $parent_tree.','.$id : $id;
                    Category::where('id', $id)->update(['tree' => $myTree]);
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/categories')->with('message', 'Operation Successful !');
        }

        return view('admin/art-category-edit', $data);
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('public/articles', $name);

            return response()->json([
                'location' => url('storage/articles/' . $name)
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $article = Article::where('id', $id);
            $data = $article->first();
            $article->delete();

            return redirect()->back()
                ->with('message', 'Article "' . $data->title . '" was deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function categoryDelete($id)
    {
        try {
            $cat = Category::where('id', $id);
            $data = $cat->first();

            $articles_count = Article::where('categories_ids', 'like', ',' . $id . ',')->count();
            if ($articles_count > 0) {
                return redirect()->back()
                    ->with('error', 'There are articles associated with this category!');
            }
            $subcateg_count = Category::where('tree', 'like', $data->tree.',%')->count();
            if ($subcateg_count > 0) {
                return redirect()->back()
                    ->with('error', 'There are subcategories to this category!');
            }

            $cat->delete();

            return redirect('/admin/categories')
                ->with('message', 'Category "' . $data->name . '" was deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
