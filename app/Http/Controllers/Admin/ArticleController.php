<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\MyClasses\UtileClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Categories;

class ArticleController extends Controller
{
    public function index(){
        $articles = DB::table('article')->orderBy('lang_parent_id')->orderBy('title')->get();
        $data= ['articles'=> $articles];
        return view('admin/article', $data);
    }
    public function view($id){
        $articles = DB::table('article')->where('article_id',$id)->get();
        $data = ['articles' => $articles[0]];
        return view('admin/article-view', $data);
    }

    public function add(Request $request){
        $groups = Categories::all();
        $language = DB::table('language')->get();
        $relatedArticles = Article::all();
        $data = ['groups' => $groups, 'relatedArticles' => $relatedArticles, 'language' => $language];

        if(!empty($_POST)){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = str_replace('<p>}</p>','',$_POST['body']);
            $categoty = $_POST['categoty'];
            $tags = $_POST['tags'];
            $status = $_POST['status'];
            $lang = $_POST['lang'];
            $rank = $_POST['rank'];
            $article_id = UtileClass::generateId('article','article_id');
            $lang_parent_id = $_POST['lang_parent_id'];

            $validated = $request->validate([
                'lang' => 'required|max:255',
                'title' => 'required|unique:article|max:255',
                'description' => 'required|max:255',
                'body' => 'required',
                'tags' => 'max:255',
                'status' => 'required|integer|max:1'
            ]);

            try{
                $art = new Article;
                $art->title = $title;
                $art->description = $description;
                $art->body = $body;
                $art->categoty = $categoty;
                $art->tags = $tags;
                $art->lang = $lang;
                $art->status = $status;
                $art->article_id = $article_id;
                $art->rank = $rank;
                //$art->lang_parent_id = $lang_parent_id;
                $art->save();
                $last_id = $art->id;

                if(!empty($last_id)){
                    $lngId = $last_id;
                    if($lang_parent_id != 0){
                        $lngId = $lang_parent_id.','.$lngId;
                    }
                    Article::where("id", $last_id)->update(['lang_parent_id'=>$lngId]);
                }

            } catch (\Exception $e){
                dd($e->getMessage());
                return Redirect::back()->with('error','DB Error !');
            }

            return redirect('/admin/article')->with('message','Operation Successful !');

        }
        return view('admin/article-add', $data);
    }

    public function edit($id){
        $categ = Categories::all();
        $relatedArticles = Article::all();
        $language = DB::table('language')->get();
        $articals = DB::table('article')->where('article_id',$id)->get();

        $data= ['artical'=> $articals[0], 'groups' => $categ, 'relatedArticles' => $relatedArticles, 'language' => $language];

        if(!empty($_POST)){

            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = str_replace('<p>}</p>','',$_POST['body']);
            $categoty = $_POST['categoty'];
            $tags = $_POST['tags'];
            $status = $_POST['status'];
            $lang = $_POST['lang'];
            $article_id = UtileClass::generateId('article','article_id');
            $lang_parent_id = $_POST['lang_parent_id'];
            $rank = $_POST['rank'];

            try{
                /*$art = Article::where('article_id',$id);
                $art->title = $title;
                $art->description = $description;
                $art->body = $body;
                $art->categoty = $categoty;
                $art->tags = $tags;
                $art->lang = $lang;
                $art->status = $status;
                $art->lang_parent_id = $lang_parent_id;
                $art->save();*/

                Article::where("article_id", $id)->update(["title" => $title,
                    'description'=>$description,
                    'body'=>$body,
                    'categoty'=>$categoty,
                    'tags'=>$tags,
                    'lang'=>$lang,
                    'status'=>$status,
                    'rank' => $rank,
                    'lang_parent_id'=>$lang_parent_id]);

            } catch (\Exception $e){
                return Redirect::back()->with('error','DB Error !');
            }

            return redirect('/admin/article')->with('message','Operation Successful !');
        }

        return view('admin/article-edit', $data);
    }

    public function groups(){

        $groups = UserGroups::all();
        $data = ['groups' => $groups];
        //echo '<pre>'; print_r($groups[0]->name); die();

        return view('admin/user-groups', $data);
    }

    public function groupsAdd(){
       /* $validatedData = $request->validate([
            'name' => 'required|unique:user_groups|max:50',
            'status' => 'required',
        ]);*/

        if(!empty($_POST)){
            try {
                $name = $_POST['name'];
                $status = $_POST['status'];
                $group = new UserGroups;
                $group->name = $name;
                $group->status = $status;
                $group->save();
            } catch (\Exception $e) {
                //print_r($e->getMessage()); die();
                return Redirect::back()->with('error','DB Error !');
            }
            return Redirect::back()->with('message','Operation Successful !');

            $data = ['date' => $_POST];
        }
        return view('admin/user-groups-add');
    }

    public function groupsEdit($id){
        $group = UserGroups::find($id);
        $data = ['group' => $group];

        if(!empty($_POST)){
            try {
                $name = $_POST['name'];
                $status = $_POST['status'];
                $group->name = $name;
                $group->status = $status;
                $group->save();
            } catch (\Exception $e) {
                //print_r($e->getMessage()); die();
                return Redirect::back()->with('error','DB Error !');
            }
            return Redirect::back()->with('message','Operation Successful !');

            //$data = ['date' => $_POST];
        }
    return view('admin/user-groups-edit', $data);
    }

    public function categories()
    {
        $categories = DB::table('Categories')->orderBY('Tree', 'asc')->orderBY('Name', 'asc')->get();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]->ind = substr_count($categories[$i]->Tree, ',');
        }
        $data= ['categories'=> $categories];
        return view('admin/art-categories', $data);
    }

    public function categoryAdd(Request $request){
        $language = DB::table('language')->get();
        $categ = Categories::all();
        $data= ['language' => $language, 'categ'=>$categ];
        $parent_tree = null;
        if(!empty($_POST)){
            $name = $_POST["name"];
            $lang = $_POST["lang"];
            $categoty = $_POST["categoty"];
            $status = $_POST["status"];
            $Categ_id = UtileClass::generateId('Categories','Categ_id');

            $validated = $request->validate([
                'name' => 'required|max:255|unique:Categories',
                'lang' => 'required|max:255',
                'status' => 'required|integer|max:1',
                'categoty'=> 'integer',
            ]);


            try{
                if(!empty($categoty)){
                    $parent_tree = Categories::where('id', $categoty)->first()->Tree;
                }
            } catch (\Exception $e){
                return Redirect::back()->with('error','DB Error !');
            }

            try{
                $cat = new Categories;
                $cat->Name = $name;
                $cat->Lang = $lang;
                $cat->Parent_id = $categoty;
                $cat->Status = $status;
                $cat->Categ_id = $Categ_id;
                $cat->save();
                $my_id = $cat->id;

                if(!empty($my_id)){
                    $mY_Tree = (!empty($parent_tree)) ? $parent_tree.','.$my_id : $my_id;
                    Categories::where("id", $my_id)->update(['Tree'=>$mY_Tree]);
                }
            } catch (\Exception $e){
                return Redirect::back()->with('error','DB Error !');
            }

            return redirect('/admin/categories')->with('message','Operation Successful !');
        }

        return view('admin/art-category-add', $data);
    }

    public function categoryEdit(Request $request){
        $id = $request->id;
        $language = DB::table('language')->get();
        $categ = Categories::all();
        $my_categ = Categories::where('Id', $id)->first();
        if(empty($my_categ)){
            return Redirect::back()->with('error','DB Error !');
        }
        $data= ['language' => $language, 'categ'=>$categ, 'my_data' => $my_categ];
        $parent_tree = null;
        if(!empty($_POST)){
            $name = $_POST["name"];
            $lang = $_POST["lang"];
            $categoty = $_POST["categoty"];
            $status = $_POST["status"];
            $Categ_id = UtileClass::generateId('Categories','Categ_id');

           if($name ==  $my_categ->Name){
               $validated = $request->validate([
                   'name' => 'required|max:255',
                   'lang' => 'required|max:255',
                   'status' => 'required|integer|max:1',
                   'categoty'=> 'integer',
               ]);
           } else {
               $validated = $request->validate([
                   'name' => 'required|max:255|unique:Categories',
                   'lang' => 'required|max:255',
                   'status' => 'required|integer|max:1',
                   'categoty'=> 'integer',
               ]);
           }


            try{
                if(!empty($categoty)){
                    $parent_tree = Categories::where('Id', $categoty)->first()->Tree;
                }
            } catch (\Exception $e){
                return Redirect::back()->with('error','DB Error !');
            }

            try{

                Categories::where("Id", $id)->update(["Name" => $name,
                    'Lang'=>$lang,
                    'Parent_id'=>$categoty,
                    'Status'=>$status,
                    'Categ_id'=>$Categ_id]);

                if(!empty($id)){
                    $mY_Tree = (!empty($parent_tree)) ? $parent_tree.','.$id : $id;
                    Categories::where("Id", $id)->update(['Tree'=>$mY_Tree]);
                }
            } catch (\Exception $e){
                return Redirect::back()->with('error','DB Error !');
            }

            return redirect('/admin/categories')->with('message','Operation Successful !');
        }

        return view('admin/art-category-edit', $data);
    }

    public function uploadImg(){

    }

    public function delete(Request $request)
    {
        $id_article = $request->id;
        try {
            $art = Article::where('article_id', $id_article);
            $art->delete();
            return redirect('/admin/article')->with('message','Operation Successful !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function categoryDelete(Request $request)
    {
        $id = $request->id;
        $my_categ = Categories::where('Id', $id)->first();
        $articles_count = (new Article)->where('categoty', $id)->count();
        $subcateg_count = (new Categories)->where('Tree', 'like', $my_categ->Tree.',%')->count();
        if($articles_count > 0){
            return redirect()->back()->with('error', 'There are articles associated with this category!');
        }
        if($subcateg_count > 0){
            return redirect()->back()->with('error', 'There are subcategories to this category!');
        }
        
        try {
            $art = Categories::where('id', $id);
            $art->delete();
            return redirect('/admin/categories')->with('message','Operation Successful !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
