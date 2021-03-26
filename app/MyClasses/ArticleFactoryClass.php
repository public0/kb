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
        }
    }

    private static function getLastArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return $articles;
    }

    private static function getNewArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->userGroups(Auth::check() ? Auth::user()->my_groups : []);

        if (!empty($data['exclude_article_id'])) {
            $articles->where('article_id', '<>', $data['exclude_article_id']);
        }

        $articles = $articles->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END desc')
            ->take(3)
            ->get();

        return $articles;
    }

    private static function getAssocArticles($data)
    {
        $articles = Article::active()
            ->where('lang', $data['lang'])
            ->where('id', '<>', $data['id'])
            ->userGroups(Auth::check() ? Auth::user()->my_groups : []);

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

        $articles = $articles->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END desc')
            ->take(5)
            ->get();

        return $articles;
    }
}
