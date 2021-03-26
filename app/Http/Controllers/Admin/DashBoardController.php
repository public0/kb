<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Category;

class DashBoardController extends Controller
{
    public function index()
    {
        $articles_all =  (new Article)->count();
        $articles_active = (new Article)->where('status', 1)->count();

        $users_all =  (new User)->count();
        $users_active = (new User)->where('status', 1)->count();

        $category_all =  (new Category)->count();
        $category_active = (new Category)->where('status', 1)->count();

        $subscribe_all =  (new Newsletter)->count();
        $subscribe_active = (new Newsletter)->where('status', 1)->count();

        $recent_articles = (new Article)->orderBy('created_at', 'desc')->take(5)->get();

        $recent_users = (new User)->orderBy('created_at', 'desc')->take(5)->get();

        $data = [
            'articles_all' => $articles_all,
            'articles_active' => $articles_active,
            'users_all' => $users_all,
            'users_active' => $users_active,
            'category_all' => $category_all,
            'category_active' => $category_active,
            'subscribe_all' => $subscribe_all,
            'subscribe_active' => $subscribe_active,
            'recent_articles' => $recent_articles,
            'recent_users' => $recent_users,
        ];

        return view('admin/dash', $data);
    }
}
