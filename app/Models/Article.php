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

    /**
     * This is view dbo.articles to work with elastic
     * The table is kb.articles
     */
    protected $table = 'articles';

    protected $indexConfigurator = ArticleIndexConfigurator::class;

    protected $searchRules = [
        //
    ];

    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text'
            ],
            'description' => [
                'type' => 'text'
            ],
            'body' => [
                'type' => 'text'
            ],
            'status' => [
                'type' => 'integer'
            ],
            'lang' => [
                'type' => 'text'
            ],
            'category_id' => [
                'type' => 'integer'
            ],
            'article_id' => [
                'type' => 'text'
            ],
            'user_groups' => [
                'type' => 'keyword',
                'null_value' => 'NULL'
            ]
        ]
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($article) {
            $article->comments()->each(function ($comment) {
                $comment->delete();
            });
        });
    }

    /**
     * Get status name.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return $this->status ? __('status.active') : __('status.inactive');
    }

    /**
     * Get comments number for article.
     *
     * @return string
     */
    public function getCommentsNumberAttribute()
    {
        return $this->comments()->count();
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'status' => $this->status,
            'lang' => $this->lang,
            'category_id' => $this->category_id,
            'article_id' => $this->article_id,
            'user_groups' => $this->user_groups
        ];
    }

    /**
     * Scope a query users with groups.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $groups
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserGroups($query, array $groups)
    {
        $like = ['[user_groups] IS NULL'];
        foreach ($groups as $group) {
            if (in_array($group, [1, 6])) {
                $like[] = '[user_groups] IS NOT NULL';
            } else {
                $like[] = "[user_groups] LIKE '%,{$group},%'";
            }
        }
        $like = array_unique($like);

        return $query->whereRaw('(' . implode(' OR ', $like) . ')');
    }

    /**
     * Scope a query to only include active acticles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query
            ->select('id', 'title', 'description', 'created_at', 'updated_at', 'article_id')
            ->where('status', 1);
    }
}
