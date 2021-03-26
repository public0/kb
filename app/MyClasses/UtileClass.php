<?php

namespace App\MyClasses;

use Illuminate\Support\Facades\DB;

class UtileClass
{
    public static function generateId($table, $id_fild)
    {
        $gen = uniqid('', true);
        $count = 1;
        while ($count != 0) {
            $class = $table;
            if (is_string($table)) {
                $class = DB::table($table);
            }
            $count = $class->where($id_fild, '=', $gen)->count();
            if ($count != 0) {
                sleep(0.1);
                $gen = uniqid('', true);
            }
        }

        return $gen;
    }
}
