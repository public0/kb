<?php
namespace App\MyClasses;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class UtileClass{
    static function generateId($table,$id_fild){
        $gen = uniqid('',true);
        $count = 1;
        while ($count != 0) {
            $count = DB::table($table)->where($id_fild,'=', $gen)->count();
            if($count != 0){
                sleep(0.1);
                $gen = uniqid('',true);
            }
        }
        return $gen;
    }

    static function getLang(){
        $lang = '';
        if(!empty($_COOKIE['lang'])){
            $lang = $_COOKIE['lang'];
        } else {
            $lang = 'RO';
        }
        return $lang;
    }
}
