<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePlaceholder extends Model
{
    use HasFactory;

    protected $table = 'tpl.placeholders';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placeholder_group_id',
        'name',
        'description',
        'status'
    ];

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
     * Get country codes.
     *
     * @return array
     */
    public function getAllCountryCodesAttribute()
    {
        $result = [];
        $items = $this->placeholderCountries()->orderBy('country_code', 'ASC')->get();
        if ($items) {
            foreach ($items as $item) {
                $result[] = $item->country_code;
            }
        }

        return $result;
    }

    /**
     * Scope a query to only include active placeholders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 1);
    }

    public function placeholderGroup()
    {
        return $this->belongsTo(TemplatePlaceholderGroup::class, 'placeholder_group_id');
    }

    public function placeholderCountries()
    {
        return $this->hasMany(TemplatePlaceholderCountry::class, 'placeholder_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($placeholder) {
            $placeholder->placeholderCountries()->each(function ($item) {
                $item->delete();
            });
        });
    }
}
