<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePlaceholderGroup extends Model
{
    use HasFactory;

    protected $table = 'tpl.placeholder_groups';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type_id',
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
     * Scope a query to only include active placeholder group.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 1);
    }

    /**
     * Get country codes.
     *
     * @return array
     */
    public function getAllSubtypesAttribute()
    {
        $result = [];
        $items = $this->subtypes()->get();
        if ($items) {
            foreach ($items as $item) {
                $result[] = $item->subtype_id;
            }
        }

        return $result;
    }

    public function type()
    {
        return $this->belongsTo(TemplateType::class, 'type_id');
    }

    public function placeholders()
    {
        return $this->hasMany(TemplatePlaceholder::class, 'placeholder_group_id');
    }

    public function subtypes()
    {
        return $this->hasMany(TemplatePlaceholderGroupSubtype::class, 'placeholder_group_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($group) {
            $group->placeholders()->each(function ($placeholder) {
                $placeholder->delete();
            });
            $group->subtypes()->each(function ($subtype) {
                $subtype->delete();
            });
        });
    }
}
