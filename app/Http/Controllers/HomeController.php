<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $articles = Article::userGroups(Auth::user()->my_groups);
        } else {
            $articles = Article::where('user_groups', null);
        }

        $data = [
            'articles' => $articles->active()->where('lang', $this->lang)->orderBy('created_at', 'desc')->paginate(20)
        ];

        return view('front/home', $data);
    }
}
