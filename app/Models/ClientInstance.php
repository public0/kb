<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInstance extends Model
{
    use HasFactory;

    protected $table = 'dbo.client_instances';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'api_key',
        'server_name',
        'instance_name',
        'ip',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
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
     * Scope a query to only include active clients.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 1);
    }
}
