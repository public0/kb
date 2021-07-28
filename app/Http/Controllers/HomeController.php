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
            ->userRole(Auth::check() ? Auth::user()->role : null)
            ->orderBy('rank', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return view('front/home', compact('articles'));
    }
}
