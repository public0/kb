<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class HomeController extends Controller
{
    public function index(){
        $article = Article::all();
        $data = ['article'=>$article];
        return view('front/row-article', $data);
    }
}










