<?php
namespace App\MyClasses;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\MyClasses\UtileClass;

class ArticleFactoryClass{
    static function getArticleList($type, $data=null){
        $data['lang'] = UtileClass::getLang();
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

        $rows = DB::table('users')->where('status', 1)->where('lang', $data['lang'])->orderBy('created_at', 'desc')->take(3)->get();
        return $rows;
    }

    static private function getNewArticle($data){

        $user_groups = UtileClass::getUserGroups();
        $like = '(';
        if($user_groups){
            if(!in_array(1, $user_groups) && !in_array(6, $user_groups)){
                for($i=0;$i < count($user_groups);$i++){
                    if($i == 0){
                        $like .= "user_groups like '%,".$user_groups[$i].",%' ";
                    } else {
                        $like .= "or user_groups like '%,".$user_groups[$i].",%' ";
                    }
                }
                $like .= ') OR user_groups IS NULL ';
                $article = Article::where('status', 1)->whereRaw($like)->where('lang', $data['lang'])->orderBy('created_at','desc')->take(3)->get();
            } else {
                $article = Article::where('status', 1)->where('lang', $data['lang'])->orderBy('created_at','desc')->take(3)->get();
            }
        } else {
            $article = Article::where('status', 1)->where('lang', $data['lang'])->where('user_groups',null)->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END desc')->take(3)->get();
        }



        //$rows = DB::select("select TOP 3 * from article WHERE status = 1 AND lang = ? order by CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END desc",[$data['lang']]);
        return $article;
    }

    static private function getAssocArticle($data){
        /*$user_groups = UtileClass::getUserGroups();
        $like = '(';
        if($user_groups){
            if(!in_array(1, $user_groups) && !in_array(6, $user_groups)){
                for($i=0;$i < count($user_groups);$i++){
                    if($i == 0){
                        $like .= "user_groups like '%,".$user_groups[$i].",%' ";
                    } else {
                        $like .= "or user_groups like '%,".$user_groups[$i].",%' ";
                    }
                }
                $like .= ') OR user_groups IS NULL ';
                $article = Article::where('status', 1)->whereRaw($like)->where('lang', $data['lang'])->orderBy('created_at','desc')->take(3)->get();
            } else {
                $article = Article::where('status', 1)->where('lang', $data['lang'])->orderBy('created_at','desc')->take(3)->get();
            }
        } else {
            $article = Article::where('status', 1)->where('lang', $data['lang'])->where('user_groups',null)->orderByRaw('CASE WHEN created_at > updated_at THEN created_at ELSE updated_at END desc')->take(3)->get();
        }*/



        $rows = DB::select("SELECT TOP 2 ar2.* FROM article ar JOIN  X_ARTICLES_TAGS xt ON ar.id = xt.Id_ARTICLE JOIN X_ARTICLES_TAGS xt2 ON (xt.Id_TAG = xt2.Id_TAG AND xt2.Id_ARTICLE != ?) LEFT JOIN article ar2 ON (ar2.id = xt2.Id_ARTICLE AND xt2.Id_ARTICLE != ?)  WHERE ar.id = ? AND ar.lang = ?",[$data['id'],$data['id'],$data['id'],$data['lang']]);
        return $rows;
    }
}
