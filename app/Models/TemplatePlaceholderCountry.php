<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePlaceholderCountry extends Model
{
    use HasFactory;

    protected $table = 'tpl.placeholder_countries';

    public $timestamps = false;

    public static $countries = [
        'ro' => 'Romania',
        'rs' => 'Serbia'
    ];

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
