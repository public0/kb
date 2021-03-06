<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePlaceholderCountry extends Model
{
    use HasFactory;

    protected $table = 'tpl.placeholder_countries';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'placeholder_id',
        'country_code'
    ];
}
