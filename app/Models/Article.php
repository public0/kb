<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'article';

    /*public function category()
    {
        return $this->hasOne(Categories::class);
    }*/

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categoty');
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'id' => $this->id,
            'lang' => $this->lang,
        ];
    }
}
