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

    public function placeholders()
    {
        return $this->hasMany(TemplatePlaceholder::class, 'placeholder_group_id');
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
        });
    }
}
