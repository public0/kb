<?php

namespace App\Models;

use App\Models\Comment;
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
            'categories_ids' => [
                'type' => 'keyword',
                'null_value' => 'NULL'
            ],
            'article_id' => [
                'type' => 'text'
            ],
            'user_role' => [
                'type' => 'keyword',
                'null_value' => 'NULL'
            ]
        ]
    ];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'status' => $this->status,
            'lang' => $this->lang,
            'category_id' => $this->category_id,
            'categories_ids' => $this->categories_ids,
            'article_id' => $this->article_id,
            'user_role' => $this->user_role
        ];
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function articleCountries()
    {
        return $this->hasMany(ArticleCountry::class, 'article_id');
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
            $article->articleCountries()->delete();
        });
    }

    /**
     * Get status name.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return $this->status ? __('status.published') : __('status.draft');
    }

    /**
     * Get in_right_col name.
     *
     * @return string
     */
    public function getInRightColNameAttribute()
    {
        return $this->in_right_col ? __('labels.yes') : __('labels.no');
    }

    /**
     * Get country codes.
     *
     * @return array
     */
    public function getAllCountryCodesAttribute()
    {
        $result = [];
        $items = $this->articleCountries()->orderBy('country_code', 'ASC')->get();
        if ($items) {
            foreach ($items as $item) {
                $result[] = $item->country_code;
            }
        }

        return $result;
    }

    /**
     * Scope a query users with roles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $role
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserRole($query, $role)
    {
        $like = ['[user_role] IS NULL'];
        if ($role !== null) {
            switch ($role) {
                case 1:
                    $like[] = '[user_role] IS NOT NULL';
                    break;
                case 2:
                    $like[] = '[user_role] NOT IN(1)';
                    break;
                case 3:
                    $like[] = '[user_role] NOT IN(1,2)';
                    break;
                default:
                    $like[] = '[user_role]=' . $role;
                    break;
            }
        }

        return $query->whereRaw('(' . implode(' OR ', $like) . ')');
    }

    /**
     * Scope a query to only get comments number by status (if needed).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCommentsNumber($query, $status = null)
    {
        $q = 'SELECT COUNT(*) FROM ' . (new Comment)->getTable() . ' AS t';
        $q .= ' WHERE t.[article_id]=' . $this->table . '.[id]';
        if ($status !== null) {
            $q .= ' AND t.[status]=' . (int)$status;
        }

        return $query->selectRaw('(' . $q . ') AS comments_number');
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
            ->select('id', 'title', 'description', 'created_at', 'updated_at', 'article_id', 'rank')
            ->commentsNumber(1)
            ->where('status', 1);
    }
}
