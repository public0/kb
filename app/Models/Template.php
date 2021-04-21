<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'tpl.templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'type_id',
        'subtype_id',
        'name',
        'content',
        'sms',
        'subject',
        'header_image',
        'footer_image',
        'country_code',
        'app_id',
        'app_images_url',
        'app_url',
        'app_user_id',
        'app_endpoint'
    ];

    public function type()
    {
        return $this->belongsTo(TemplateType::class, 'type_id');
    }

    public function subtype()
    {
        return $this->belongsTo(TemplateSubtype::class, 'subtype_id');
    }

    /**
     * Get template type.
     *
     * @return string
     */
    public function getTplTypeAttribute()
    {
        $type = null;
        if (in_array($this->type_id, [1, 2, 3])) {
            $type = 'email';
        }
        if (in_array($this->type_id, [4, 5, 6])) {
            $type = 'notification';
        }

        return $type;
    }
}
