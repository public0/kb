<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        if ($authUser->client_id) {
            $users_all = User::where('client_id', $authUser->client_id)->count();
            $users_active = User::active()->where('client_id', $authUser->client_id)->count();
            $recent_users = User::orderBy('created_at', 'desc')
                ->where('client_id', $authUser->client_id)
                ->take(5)
                ->get();
        } else {
            $users_all = User::count();
            $users_active = User::active()->count();
            $recent_users = User::orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        }

        $articles_all = Article::count();
        $articles_active = Article::active()->count();
        $recent_articles = Article::with('updatedBy')
            ->userRole($authUser->role)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $category_all = Category::count();
        $category_active = Category::active()->count();

        $subscribe_all = Newsletter::count();
        $subscribe_active = Newsletter::where('status', 1)->count();

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
            'auth_user' => $authUser
        ];

        return view('admin/dash', $data);
    }
}
