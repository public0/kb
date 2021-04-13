<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use App\Models\UserGroups;
use App\MyClasses\UtileClass;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select(
            'id',
            'title',
            'lang',
            'tags',
            'created_at',
            'status',
            'article_id',
            'lang_parent_id'
        )
            ->orderBy('lang_parent_id', 'asc')
            ->paginate(50);

        return view('admin/article', compact('articles'));
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

    public function add(Request $request)
    {
        $user_groups = UserGroups::active()->get();
        $categories = Category::active()->get();
        $language = Language::all();
        $data = [
            'categories' => $categories,
            'language' => $language,
            'user_groups' => $user_groups
        ];

        if (!empty($_POST)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = trim($_POST['body']);
            $category_id = $_POST['category_id'];
            $tags = $_POST['tags'] ?? [];
            $status = $_POST['status'];
            $lang = $_POST['lang'];
            $rank = $_POST['rank'];
            $lang_parent_id = $_POST['lang_parent_id'] ?? null;
            $u_groups = $_POST['user_groups'] ?? [];
            $in_right_col = $_POST['in_right_col'];

            $validated = $request->validate([
                'lang' => 'required|max:255',
                'title' => 'required|max:255|unique:' . Article::class,
                'description' => 'required|max:255',
                'body' => 'required',
                'tags' => 'max:255',
                'status' => 'required|integer|max:1'
            ]);

            if (!empty($lang_parent_id)) {
                $parent = Article::select('id', 'lang')->find($lang_parent_id);
                if ($parent) {
                    $lang_parent_id = $parent->id;
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
                    $art->article_id = 'AT' . strtoupper(dechex($last_id));
                    $art->save();
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
        $article->user_groups = array_filter(explode(',', $article->user_groups));
        $article->tags = array_filter(explode(',', $article->tags));

        $data = [
            'article' => $article,
            'categories' => $categories,
            'language' => $language,
            'user_groups' => $user_groups
        ];
        if ($article->lang_parent_id) {
            $data['article_lang'] = Article::select('id', 'title')->find($article->lang_parent_id);
        }

        if (!empty($_POST)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = trim($_POST['body']);
            $category_id = $_POST['category_id'];
            $tags = $_POST['tags'] ?? [];
            $status = $_POST['status'];
            $lang = $_POST['lang'];
            $lang_parent_id = $_POST['lang_parent_id'] ?? null;
            $rank = $_POST['rank'];
            $u_groups = $_POST['user_groups'] ?? [];
            $in_right_col = $_POST['in_right_col'];
            $article_id = UtileClass::generateId(new Article, 'article_id');

            if ($title != $article->title) {
                $validated = $request->validate([
                    'lang' => 'required|max:255',
                    'title' => 'required|max:255|unique:' . Article::class,
                    'description' => 'required|max:255',
                    'body' => 'required',
                    'tags' => 'max:255',
                    'status' => 'required|integer|max:1'
                ]);
            } else {
                $validated = $request->validate([
                    'lang' => 'required|max:255',
                    'description' => 'required|max:255',
                    'body' => 'required',
                    'tags' => 'max:255',
                    'status' => 'required|integer|max:1'
                ]);
            }

            if (!empty($lang_parent_id)) {
                $parent = Article::select('id', 'lang')->find($lang_parent_id);
                if ($parent) {
                    $lang_parent_id = $parent->id;
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
                    'tags' => $tags ? ',' . implode(',', $tags) . ',' : null,
                    'lang' => $lang,
                    'status' => $status,
                    'rank' => $rank,
                    'user_groups' => $u_groups ? ',' . implode(',', $u_groups) . ',' : null,
                    'lang_parent_id' => $lang_parent_id,
                    'in_right_col' => $in_right_col
                ]);
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
        $data = ['categories' => $categories];

        return view('admin/art-categories', $data);
    }

    public function categoryAdd(Request $request)
    {
        $language = Language::all();
        $categ = Category::all();
        $data = ['language' => $language, 'categ' => $categ];
        $parent_tree = null;
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
                if (!empty($parent_id)) {
                    $parent_tree = Category::where('id', $parent_id)->first()->tree;
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            try {
                $cat = new Category;
                $cat->name = $name;
                $cat->lang = $lang;
                $cat->parent_id = $parent_id;
                $cat->status = $status;
                $cat->categ_id = $categ_id;
                $cat->save();
                $my_id = $cat->id;

                if (!empty($my_id)) {
                    $myTree = (!empty($parent_tree)) ? $parent_tree.','.$my_id : $my_id;
                    Category::where('id', $my_id)->update(['tree' => $myTree]);
                }
            } catch (\Exception $e) {
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
        $categ = Category::all();
        $my_categ = Category::where('id', $id)->first();
        if (empty($my_categ)) {
            return redirect()->back()->with('error', 'No category!');
        }
        $data = ['language' => $language, 'categ' => $categ, 'my_data' => $my_categ];
        $parent_tree = null;
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $lang = $_POST['lang'];
            $parent_id = $_POST['parent_id'];
            $status = $_POST['status'];
            $categ_id = UtileClass::generateId(new Category, 'categ_id');

            if ($name == $my_categ->Name) {
                $validated = $request->validate([
                    'name' => 'required|max:255',
                    'lang' => 'required|max:255',
                    'status' => 'required|integer|max:1',
                    'parent_id' => 'integer'
                ]);
            } else {
                $validated = $request->validate([
                    'name' => 'required|max:255|unique:' . Category::class,
                    'lang' => 'required|max:255',
                    'status' => 'required|integer|max:1',
                    'parent_id' => 'integer'
                ]);
            }

            try {
                if (!empty($parent_id)) {
                    $parent_tree = Category::where('id', $parent_id)->first()->tree;
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            try {
                Category::where('id', $id)->update([
                    'name' => $name,
                    'lang' => $lang,
                    'parent_id' => $parent_id,
                    'status' => $status,
                    'categ_id' => $categ_id
                ]);
                if (!empty($id)) {
                    $myTree = (!empty($parent_tree)) ? $parent_tree.','.$id : $id;
                    Category::where('id', $id)->update(['tree' => $myTree]);
                }
            } catch (\Exception $e) {
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
        $my_categ = Category::where('Id', $id)->first();
        $articles_count = (new Article)->where('category_id', $id)->count();
        $subcateg_count = (new Categories)->where('Tree', 'like', $my_categ->Tree.',%')->count();
        if ($articles_count > 0) {
            return redirect()->back()->with('error', 'There are articles associated with this category!');
        }
        if ($subcateg_count > 0) {
            return redirect()->back()->with('error', 'There are subcategories to this category!');
        }

        try {
            $art = Category::where('id', $id);
            $art->delete();
            return redirect('/admin/categories')->with('message', 'Operation Successful !');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
