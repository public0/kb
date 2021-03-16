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

    public function placeholderGroup()
    {
        return $this->belongsTo(TemplatePlaceholderGroup::class, 'placeholder_group_id');
    }
}
