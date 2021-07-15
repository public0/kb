<?php

namespace App\MyClasses;

use App\Models\Article;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ArticleFactoryClass
{
    public static function getArticleList($type, $data = [])
    {
        $data['lang'] = App::currentLocale();
        switch ($type) {
            case 'last':
                return self::getLastArticles($data);
                break;
            case 'new':
                return self::getNewArticles($data);
                break;
            case 'asoc':
                return self::getAssocArticles($data);
                break;
            case 'right_col':
                return self::getRightColumnArticles($data);
                break;
        }
    }

    private static function getRightColumnArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->where('in_right_col', 1)
            ->userRole(Auth::check() ? Auth::user()->role : null)
            ->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END DESC')
            ->get();

        return $articles;
    }

    private static function getLastArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->orderBy('rank', 'DESC')
            ->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END DESC')
            ->take(5)
            ->get();

        return $articles;
    }

    private static function getNewArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->userRole(Auth::check() ? Auth::user()->role : null);

        if (!empty($data['exclude_article_id'])) {
            $articles->where('article_id', '<>', $data['exclude_article_id']);
        }

        $articles = $articles->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END DESC')
            ->take(3)
            ->get();

        return $articles;
    }

    private static function getAssocArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->where('id', '<>', $data['id'])
            ->userRole(Auth::check() ? Auth::user()->role : null);

        if (!empty($data['tags'])) {
            $like = [];
            $tags = array_filter(explode(',', $data['tags']));
            foreach ($tags as $tag) {
                $like[] = "tags LIKE '%,{$tag},%'";
            }
            if ($like) {
                $articles->whereRaw('(' . implode(' OR ', $like) . ')');
            }
        }

        $articles = $articles->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END DESC')
            ->take(5)
            ->get();

        return $articles;
    }
}
