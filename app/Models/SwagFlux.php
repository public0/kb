<?php

namespace App\Models;

use App\Models\SwagMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwagFlux extends Model
{
    use HasFactory;

    protected $table = 'swag.fluxes';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_id',
        'name',
        'description',
        'methods',
        'status'
    ];

    public function document()
    {
        return $this->belongsTo(SwagDocument::class, 'document_id');
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
     * Get all methods ordered.
     *
     * @param array $clientMethods
     * @return \Illuminate\Support\Collection
     */
    public function getAllMethods($clientMethods)
    {
        $data = json_decode($this->methods, true);
        $methods = SwagMethod::active()->whereIn('id', $data);
        if ($clientMethods) {
            $methods->whereIn('id', $clientMethods);
        }
        $methods = $methods->get();

        $result = [];
        $newData = array_flip($data);
        foreach ($methods as $method) {
            $key = $newData[$method->id];
            $result[$key] = $method;
        }

        return collect($result)->sortKeys();
    }
}
