<?php

namespace App\Models;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $table = 'dbo.localization';

    public $timestamps = false;

    public static function tableFields()
    {
        $result = [];
        $languages = Language::all();
        foreach ($languages as $language) {
            $result[] = strtolower($language->abv);
        }

        return $result;
    }
}
