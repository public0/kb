<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSubtype extends Model
{
    use HasFactory;

    protected $table = 'tpl.subtypes';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
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

    public function type()
    {
        return $this->belongsTo(TemplateType::class, 'type_id');
    }

    public function placeholderGroups()
    {
        return $this->hasMany(TemplatePlaceholderGroupSubtype::class, 'subtype_id');
    }
}
