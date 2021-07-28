<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'dbo.settings';

    public $timestamps = false;

    /**
     * Get setting value by key.
     *
     * @return mixed
     */
    public function scopeByKey($query, $key)
    {
        $result = $query->where('key', $key)->first();

        return $result->value;
    }
}
