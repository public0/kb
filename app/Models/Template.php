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
        'name',
        'content',
        'subject',
        'header_image',
        'footer_image',
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
}