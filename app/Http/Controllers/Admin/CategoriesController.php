<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $this->authorize('viewPerms', 'AdminKBCategories');

        $categories = Category::orderBy('tree', 'asc')->orderBy('name', 'asc')->get();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]->ind = substr_count($categories[$i]->tree, ',');
        }

        return view('admin/categories', compact('categories'));
    }

    public function status($id)
    {
        $this->authorize('viewPerms', 'AdminKBCategories');

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

    public function add(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBCategories');

        if ($request->isMethod('post')) {
            $name = trim($request->input('name'));
            $lang = trim($request->input('lang'));
            $parent_id = $request->input('parent_id');
            $status = $request->input('status');
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

        return view('admin/categories-form', [
            'language' => Language::all(),
            'categs' => Category::all(),
            'category' => null
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('viewPerms', 'AdminKBCategories');

        $category = Category::where('id', $id)->first();
        if (empty($category)) {
            return redirect()->back()->with('error', 'No category!');
        }
        if ($request->isMethod('post')) {
            $name = trim($request->input('name'));
            $lang = trim($request->input('lang'));
            $parent_id = $request->input('parent_id');
            $status = $request->input('status');
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

        return view('admin/categories-form', [
            'language' => Language::all(),
            'categs' => Category::all(),
            'category' => $category
        ]);
    }

    public function delete($id)
    {
        $this->authorize('viewPerms', 'AdminKBCategories');

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
