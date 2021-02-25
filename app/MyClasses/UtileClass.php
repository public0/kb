<?php
namespace App\MyClasses;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        App::setLocale($lang);
        return $lang;
    }

    static function getUserGroups(){
        $groupsArray = null;
        if(Auth::check()) {
            $id = Auth::user()->id;
            $groups = DB::table('x_groups_users')->where('user_id', $id)->select('group_id')->get();
            if($groups){
                foreach ($groups as $gr){
                    $groupsArray[] = $gr->group_id;
                }
            }
        }
        return $groupsArray;
    }
}
