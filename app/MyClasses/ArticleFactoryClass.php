<?php
namespace App\MyClasses;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleFactoryClass{
    static function getArticleList($type, $data=null){
        switch($type){
            case 'last':
                return self::getLastArticle($data);
            break;
            case 'new':
                return self::getNewArticle($data);
            break;
            case 'asoc':
                return self::getAssocArticle($data);
            break;
        }
    }

    static private function getLastArticle($data){
        $rows = DB::table('users')->where('status', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return $rows;
    }

    static private function getNewArticle($data){
        $rows = DB::table('article')->where('status', '=', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return $rows;
    }

    static private function getAssocArticle($data){
        $rows = DB::select("SELECT TOP 2 ar2.* FROM article ar JOIN  X_ARTICLES_TAGS xt ON ar.id = xt.Id_ARTICLE JOIN X_ARTICLES_TAGS xt2 ON (xt.Id_TAG = xt2.Id_TAG AND xt2.Id_ARTICLE != ?) LEFT JOIN article ar2 ON (ar2.id = xt2.Id_ARTICLE AND xt2.Id_ARTICLE != ?)  WHERE ar.id = ?",[$data['id'],$data['id'],$data['id']]);
        return $rows;
    }
}
