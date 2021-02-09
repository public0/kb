<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
use ScoutElastic\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'article';

    protected $indexConfigurator = ArticleIndexConfigurator::class;

    protected $searchRules = [
        //
    ];

    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
            ],
            'description' => [
                'type' => 'text',
            ],
            'body' => [
                'type' => 'text',
            ],
            'status' => [
                'type' => 'text',
            ],
            'lang' => [
                'type' => 'text',
            ],
            'categoty' => [
                'type' => 'text',
            ],
        ]
    ];

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
            'status' => $this->status,
            'lang' => $this->lang,
            'categoty' => $this->categoty,
        ];
    }
}
