<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwagMethod extends Model
{
    use HasFactory;

    protected $table = 'swag.methods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'type',
        'description',
        'url',
        'parameters',
        'output',
        'notes',
        'status',
        'stage'
    ];

    public $stages = [
        1 => 'In defining',
        2 => 'In development',
        3 => 'In production'
    ];

    public function group()
    {
        return $this->belongsTo(SwagGroup::class, 'group_id');
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
     * Get stage name.
     *
     * @return string
     */
    public function getStageNameAttribute()
    {
        return $this->stage ? $this->stages[$this->stage] : null;
    }

    /**
     * Get parameters values.
     *
     * @return array
     */
    public function getParametersDataAttribute()
    {
        return $this->parameters ? unserialize($this->parameters) : [];
    }

    /**
     * Get output values.
     *
     * @return array
     */
    public function getOutputDataAttribute()
    {
        return $this->output ? unserialize($this->output) : [];
    }
}
