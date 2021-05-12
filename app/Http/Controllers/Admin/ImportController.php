<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function index($type)
    {
        if (method_exists($this, $type)) {
            $this->{$type}();
            echo 'DONE!';
        } else {
            abort(404);
        }
    }

    private function images()
    {
        $spath = storage_path(str_replace('/', DIRECTORY_SEPARATOR, 'app/public/articles/'));
        $articles = Article::all();
        foreach ($articles as $article) {
            if (preg_match_all(
                '/<img[^>]+src=(?:\"|\')\K(.[^">]+?)(?=\"|\')/',
                $article->body,
                $matches,
                PREG_SET_ORDER
            )) {
                foreach ($matches as $values) {
                    if (strstr($values[0], '/storage/articles')) {
                        continue;
                    }
                    if (strstr($values[0], 'http://www.ringhel.ro/GeFEEdesk')) {
                        continue;
                    }
                    if (strstr($values[0], 'ftp://ftp.ringhel.ro/')) {
                        continue;
                    }

                    if (strstr($values[0], ';base64')) {
                        $parts = explode(',', $values[0]);
                        preg_match('/image\/([a-z]+)/', $parts[0], $match);
                        $name = md5(time()).'.'.$match[1];
                        $path = '/storage/articles/' . $name;
                        file_put_contents($spath . $name, base64_decode($parts[1]));
                        $article->body = str_replace($values[0], $path, $article->body);
                        $article->save();
                    } else {
                        $name = basename($values[0]);
                        try {
                            $result = file_get_contents($values[0]);
                            if ($result) {
                                file_put_contents($spath . $name, $result);
                                $path = '/storage/articles/' . $name;
                                $article->body = str_replace($values[0], $path, $article->body);
                                $article->save();
                            }
                        } catch (\Exception $e) {
                        }
                    }

                    echo $values[0];
                    echo '<br>';
                }
            }
        }
    }

    private function files()
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            if (preg_match_all(
                '/<a[^>]+href=(?:\"|\')\K(.[^">]+?)(?=\"|\')/',
                $article->body,
                $matches,
                PREG_SET_ORDER
            )) {
                foreach ($matches as $values) {
                    if (strstr($values[0], 'http://sb.ringhel.ro/files/')) {
                        $path = '/storage/articles/files/' . basename($values[0]);
                        $article->body = str_replace($values[0], $path, $article->body);
                        $article->save();
                    }
                }
            }
        }
    }

    private function articles()
    {
        $articles = DB::table('dbo.tblarticle')
            ->where('status', 'P')
            ->get();
        foreach ($articles as $article) {
            $art = new Article;
            $art->id = $article->id;
            $art->article_id = 'AT' . strtoupper(dechex($article->id));
            $art->title = str_replace('\"', '"', $article->title);
            $art->description = strip_tags(substr($article->body, 0, strpos($article->body, '.')));
            $art->body = str_replace('\r\n', PHP_EOL, $article->description);
            $art->category_id = $article->subcat_id ?? 1;
            $art->tags = null;
            $art->lang = $article->lang_id == 38 ? 'RO' : 'EN';
            $art->status = $article->status == 'P' ? 1 : 0;
            $art->lang_parent_id = null;
            $art->rank = $article->sorting_id;
            $art->user_groups = null;
            $art->in_right_col = 0;
            $art->save();
        }
    }
}
