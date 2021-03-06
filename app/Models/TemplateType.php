<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateType extends Model
{
    use HasFactory;

    protected $table = 'tpl.types';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
     * Scope a query to only include active type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 1);
    }

    public function subtypes()
    {
        return $this->hasMany(TemplateSubtype::class, 'type_id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($type) {
            $type->subtypes()->each(function ($subtype) {
                $subtype->delete();
            });
        });
    }
}
