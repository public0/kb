<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwagGroup extends Model
{
    use HasFactory;

    protected $table = 'swag.groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_id',
        'name',
        'status'
    ];

    public function document()
    {
        return $this->belongsTo(SwagDocument::class, 'document_id');
    }

    public function methods()
    {
        return $this->hasMany(SwagMethod::class, 'group_id');
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
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($group) {
            $group->methods()->each(function ($method) {
                $method->delete();
            });
        });
    }
}
