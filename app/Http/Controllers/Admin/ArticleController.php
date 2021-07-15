<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Countries;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCountry;
use App\Models\Category;
use App\Models\Language;
use App\Models\User;
use App\MyClasses\UtileClass;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use Countries;

    public function index(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBArticles');

        $articles = Article::with('updatedBy')
            ->select(
                'id',
                'title',
                'lang',
                'tags',
                'created_at',
                'updated_at',
                'updated_by',
                'status',
                'article_id',
                'in_right_col',
                'lang_parent_id'
            )
            ->commentsNumber()
            ->orderBy('id', 'ASC');

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
        $this->authorize('viewPerms', 'AdminKBArticles');

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
        $this->authorize('viewPerms', 'AdminKBArticles');

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
        $this->authorize('viewPerms', 'AdminKBArticles');

        if ($request->isMethod('post')) {
            $title = trim($request->input('title'));
            $description = trim($request->input('description'));
            $body = trim($request->input('body'));
            $category_id = $request->input('category_id');
            $categories_ids = $request->input('categories_ids');
            if ($categories_ids) {
                $category_id = $categories_ids[0];
            }
            $tags = $request->input('tags');
            $status = $request->input('status');
            $lang = $request->input('lang');
            $rank = $request->input('rank');
            $lang_parent_id = $request->input('lang_parent_id');
            $user_role = $request->input('user_role');
            $in_right_col = $request->input('in_right_col');

            $validated = $request->validate([
                'countries' => 'required',
                'lang' => 'required|max:255',
                'title' => 'required|max:255|unique:' . Article::class,
                'description' => 'required|max:255',
                'body' => 'required',
                'rank' => 'unique:' . Article::class,
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
                $art->user_role = $user_role;
                $art->in_right_col = $in_right_col;
                $art->updated_by = Auth::id();
                dd($art);
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
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/article')->with('message', 'Operation Successful !');
        }

        return view('admin/article-form', [
            'article' => null,
            'article_lang' => null,
            'categories' => Category::active()->get(),
            'language' => Language::all(),
            'countries' => $this->getAllCountries(),
            'user_roles' => (new User)->roles,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('viewPerms', 'AdminKBArticles');

        $article = Article::find($id);
        $article->categories_ids = array_filter(explode(',', $article->categories_ids));
        $article->tags = array_filter(explode(',', $article->tags));

        $articleLang = null;
        if ($article->lang_parent_id) {
            $articleLang = Article::select('id', 'title')->find($article->lang_parent_id);
        }

        if ($request->isMethod('post')) {
            $title = trim($request->input('title'));
            $description = trim($request->input('description'));
            $body = trim($request->input('body'));
            $category_id = $request->input('category_id');
            $categories_ids = $request->input('categories_ids');
            if ($categories_ids) {
                $category_id = $categories_ids[0];
            }
            $tags = $request->input('tags');
            $status = $request->input('status');
            $lang = $request->input('lang');
            $rank = $request->input('rank');
            $lang_parent_id = $request->input('lang_parent_id');
            $user_role = $request->input('user_role');
            $in_right_col = $request->input('in_right_col');
            $article_id = UtileClass::generateId(new Article, 'article_id');

            if (strtolower($title) != strtolower($article->title)) {
                $validated = $request->validate([
                    'countries' => 'required',
                    'lang' => 'required|max:255',
                    'title' => 'required|max:255|unique:' . Article::class,
                    'description' => 'required|max:255',
                    'body' => 'required',
                    'rank' => 'unique:' . Article::class,
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
                    'rank' => 'unique:' . Article::class,
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
                    'user_role' => $user_role,
                    'lang_parent_id' => $lang_parent_id,
                    'article_id' => $articleID,
                    'in_right_col' => $in_right_col,
                    'updated_by' => Auth::id()
                ]);

                $deletedRows = ArticleCountry::where('article_id', $article->id);
                $deletedRows->delete();
                foreach ($request->input('countries', []) as $country) {
                    ArticleCountry::create([
                        'article_id' => $article->id,
                        'country_code' => $country
                    ]);
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }

            return redirect('/admin/article')->with('message', 'Operation Successful !');
        }

        return view('admin/article-form', [
            'article' => $article,
            'article_lang' => $articleLang,
            'categories' => Category::active()->get(),
            'language' => Language::all(),
            'countries' => $this->getAllCountries(),
            'user_roles' => (new User)->roles
        ]);
    }

    public function clone($id)
    {
        try {
            $article = Article::find($id);
            $article->replicate();
            $article->created_at = Carbon::now();
            $article->updated_at = Carbon::now();
            $article->save();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }

        return redirect('/admin/article')->with('message', 'Operation Successful !');
    }

    public function uploadImage(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBArticles');

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
        $this->authorize('viewPerms', 'AdminKBArticles');

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

    /**
     * AJAX
     *
     * @param Request $request
     * @return JSON
     */
    public function ajaxList(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBArticles');

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
     * AJAX
     *
     * @param Request $request
     * @param int $id Article ID
     * @return JSON
     */
    public function ajaxItem(Request $request, $id)
    {
        $this->authorize('viewPerms', 'AdminKBArticles');

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
