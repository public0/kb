<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $articles = [];
        $q = trim($request->input('q'));
        if ($q && strlen($q) > 2 && strlen($q) < 50) {
            $items = Article::search($q)
                ->where('status', 1)
                ->get();

            if (!empty($items)) {
                foreach ($items as $item) {
                    if ($item->user_groups) {
                        $userGroups = Auth::check() ? Auth::user()->my_groups : [];
                        if ($userGroups) {
                            if (count(array_intersect([1, 6], $userGroups)) == 0) {
                                if (!array_intersect(array_filter(explode(',', $item->user_groups)), $userGroups)) {
                                    continue;
                                }
                            }
                        } else {
                            continue;
                        }
                    }
                    $articles[] = $item;
                }
            }
        }

        return view('front/search', compact('articles'));
    }

    public function helpSearch(Request $request)
    {
        $articles = [];
        $q = trim($request->input('q'));
        if ($q && strlen($q) > 2 && strlen($q) < 50) {
            $articles = Article::search($q)
                ->where('status', 1)
                ->where('user_groups', 'NULL')
                ->get();
        }

        return view('front/help-search', compact('articles'));
    }
}
