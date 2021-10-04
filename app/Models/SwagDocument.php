<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwagDocument extends Model
{
    use HasFactory;

    protected $table = 'swag.documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'url',
        'version',
        'version_in_url',
        'description',
        'auth'
    ];

    public function groups()
    {
        return $this->hasMany(SwagGroup::class, 'document_id');
    }

    /**
     * Get auth values.
     *
     * @return array
     */
    public function getAuthDataAttribute()
    {
        return $this->auth ? unserialize($this->auth) : [];
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($doc) {
            $doc->groups()->each(function ($group) {
                $group->delete();
            });
        });
    }
}
