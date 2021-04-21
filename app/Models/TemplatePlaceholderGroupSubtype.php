<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePlaceholderGroupSubtype extends Model
{
    use HasFactory;

    protected $table = 'tpl.placeholder_groups_subtypes';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placeholder_group_id',
        'subtype_id'
    ];
}
