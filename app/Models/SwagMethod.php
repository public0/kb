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
        'output_success',
        'output_error',
        'notes',
        'status'
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
     * Get parameters values.
     *
     * @return array
     */
    public function getParametersDataAttribute()
    {
        return $this->parameters ? unserialize($this->parameters) : [];
    }

    /**
     * Get output success values.
     *
     * @return array
     */
    public function getOutputSuccessDataAttribute()
    {
        return $this->output_success ? unserialize($this->output_success) : [];
    }

    /**
     * Get output error values.
     *
     * @return array
     */
    public function getOutputErrorDataAttribute()
    {
        return $this->output_error ? unserialize($this->output_error) : [];
    }
}
