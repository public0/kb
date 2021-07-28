<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    private function term($q)
    {
        $q = str_replace('?', ' ', $q);
        $q = str_replace('/', ' ', $q);
        $q = str_replace('!', ' ', $q);
        $q = str_replace('@', ' ', $q);
        $q = str_replace('#', ' ', $q);
        $q = str_replace('$', ' ', $q);
        $q = str_replace('%', ' ', $q);
        $q = str_replace('^', ' ', $q);
        $q = str_replace('&', ' ', $q);
        $q = str_replace('*', ' ', $q);
        $q = str_replace('(', ' ', $q);
        $q = str_replace(')', ' ', $q);
        $q = str_replace('-', ' ', $q);
        $q = str_replace('_', ' ', $q);
        $q = str_replace('=', ' ', $q);
        $q = str_replace('+', ' ', $q);
        $q = str_replace('<', ' ', $q);
        $q = str_replace('>', ' ', $q);
        $q = str_replace(';', ' ', $q);
        $q = str_replace(':', ' ', $q);
        $q = str_replace('|', ' ', $q);
        $q = str_replace('\\', ' ', $q);
        $q = str_replace('[', ' ', $q);
        $q = str_replace(']', ' ', $q);
        $q = str_replace('{', ' ', $q);
        $q = str_replace('}', ' ', $q);
        $q = str_replace('–', ' ', $q);
        $q = preg_replace('/\s+/', ' ', $q);
        $q = trim($q);

        $q = str_replace(' ', ' +', $q);

        return $q;
    }

    public function index(Request $request)
    {
        $articles = [];
        $q = trim($request->input('q'));
        if ($q && strlen($q) > 2) {
            $items = Article::search($this->term($q))
                ->where('status', 1);

            $role = Auth::check() ? Auth::user()->role : null;
            if ($role !== null) {
                switch ($role) {
                    case 1:
                        // pass
                        break;
                    case 2:
                        $items->whereNotIn('user_role', [1]);
                        break;
                    case 3:
                        $items->whereNotIn('user_role', [1,2]);
                        break;
                    default:
                        $items->where('user_role', $role);
                        break;
                }
            } else {
                $items->where('user_role', 'NULL');
            }

            $articles = $items->get();
        }

        return view('front/search', compact('articles'));
    }

    public function helpSearch(Request $request)
    {
        $articles = [];
        $q = trim($request->input('q'));
        if ($q && strlen($q) > 2) {
            $articles = Article::search($this->term($q))
                ->where('status', 1)
                ->where('user_role', 'NULL')
                ->get();
        }

        return view('front/help-search', compact('articles'));
    }
}
