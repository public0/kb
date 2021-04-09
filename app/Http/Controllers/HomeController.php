<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::active()
            ->where('lang', $this->lang)
            ->userGroups(Auth::check() ? Auth::user()->my_groups : [])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('front/home', compact('articles'));
    }
}
